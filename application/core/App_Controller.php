<?php
/**
 * A base controller for CodeIgniter with view autoloading, layout support,
 * model loading, helper loading, asides/partials and per-controller 404
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-controller
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

class App_Controller extends CI_Controller
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * The current request's view. Automatically guessed
     * from the name of the controller and action
     */
    protected $view = '';

    /**
     * An array of variables to be passed through to the
     * view, layout and any asides
     */
    protected $data = array();

    /**
     * The name of the layout to wrap around the view.
     */
    protected $layout;

    /**
     * An arbitrary list of asides/partials to be loaded into
     * the layout. The key is the declared name, the value the file
     */
    protected $asides = array();

    /**
     * A list of models to be autoloaded
     */
    protected $models = array('user','notification');

    /**
     * A formatting string for the model autoloading feature.
     * The percent symbol (%) will be replaced with the model name.
     */
    protected $model_string = '%_model';

    /**
     * A list of helpers to be autoloaded
     */
    protected $helpers = array();
    
    protected $js=array('jquery-1.9.1.min.js');
    
    protected $css=array('reset.css','application.css');
    
    protected $title;
    
    protected $authenticate=FALSE;

    protected $authentication_redirect='authentication-error';

    /* --------------------------------------------------------------
     * GENERIC METHODS
     * ------------------------------------------------------------ */

    /**
     * Initialise the controller, tie into the CodeIgniter superobject
     * and try to autoload the models and helpers
     */
    public function __construct()
    {
        parent::__construct();

        $db_config=$this->config->item('database');
        $this->load->database($db_config);

        $this->_load_helpers();
        $this->_load_models();
    }

    /**
     * Ensure the user has access to this page
     */
    protected function authenticate()
    {
        if($this->authenticate===FALSE)
        {
            return TRUE;
        }
        elseif(is_array($this->authenticate))
        {
            foreach($this->authenticate as $allowed_role)
            {
                if($this->user->has_role($allowed_role)===TRUE)
                {
                    return TRUE;
                }
            }
        }

        // Do not authenticate if they do not have a valid role or
        // a role is not correctly set
        return FALSE;
    }

    /* --------------------------------------------------------------
     * VIEW RENDERING
     * ------------------------------------------------------------ */
    
    protected function _load_data()
    {
        /*
        |--------------------------------------------------------------------------
        | Basic Data
        |--------------------------------------------------------------------------
        |
        | Formatted title, meta tags, copyright, javascript and css
        |
        */
        
        // Set values that will be used more than once as vars
        $site_name=$this->config->item('site_name');
        $copyright=sprintf($this->config->item('copyright_format'),$site_name,date('Y'));
        
        // Get the default meta data
        $meta=array(
            'title'=>empty($this->title) ? $site_name : $this->title,
            'description'=>$this->config->item('site_description'),
            'copyright'=>str_replace(' &copy;','',$copyright),
        );
        // Overwrite the meta defaults if specified values exist
        if(!empty($this->data['meta']) && is_array($this->data['meta']))
            $meta=array_merge($meta,$this->data['meta']);
        
        // Set the basic data
        $this->data['meta']=$meta;
        $this->data['css']=$this->css;
        $this->data['js']=$this->js;
        $this->data['title']=empty($this->title) ? $site_name : sprintf($this->config->item('title_format'),$site_name,$this->title);
        $this->data['copyright']=$copyright;
        $this->data['ga_code']=$this->config->item('ga_code');
        
        /*
        |--------------------------------------------------------------------------
        | Global Data
        |--------------------------------------------------------------------------
        |
        | Site name, page title
        |
        */
        
        // Set the global data
        $this->data['site_name']=$site_name;
        $this->data['page_title']=$this->title;
        $this->data['slug_id_string']=implode('-',$this->uri->rsegment_array());
        $this->data['logged_in']=$this->user->logged_in;
        $this->data['user']=$this->session->userdata('user');
        $this->data['errors']=validation_errors('<li>','</li>');
        $this->data['notifications']=$this->get_notifications();
    }
    
    public function get_notifications($erase=TRUE)
    {
        $notifications=$this->session->userdata('notifications');
        
        if($erase!==FALSE)
            $this->session->unset_userdata('notifications');
        
        return $notifications;
    }
    
    public function set_notification($message)
    {
        $notifications=$this->session->userdata('notifications');
        
        if(empty($notifications))
            $notifications=array($message);
        else
            $notifications[]=$message;
        
        $this->session->set_userdata('notifications',$notifications);
    }
    
    /**
     * Override CodeIgniter's despatch mechanism and route the request
     * through to the appropriate action. Support custom 404 methods and
     * autoload the view into the layout.
     */
    public function _remap($method)
    {
        if (method_exists($this, $method))
        {
            call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));

            if($this->authenticate()===FALSE)
            {
                redirect($this->authentication_redirect);
            }
        }
        else
        {
            if (method_exists($this, '_404'))
            {
                call_user_func_array(array($this, '_404'), array($method));
            }
            else
            {
                show_404(strtolower(get_class($this)).'/'.$method);
            }
        }

        $this->_load_view();
    }

    /**
     * Automatically load the view, allowing the developer to override if
     * he or she wishes, otherwise being conventional.
     */
    protected function _load_view()
    {
        // Check for authentication
        if($this->authenticate===TRUE && $this->user->logged_in!==TRUE)
            redirect('login');
        
        // If $this->view == FALSE, we don't want to load anything
        if ($this->view !== FALSE)
        {
            // Populate data that exists for every page
            $this->_load_data();
            
            // If $this->view isn't empty, load it. If it isn't, try and guess based on the controller and action name
            $view = (!empty($this->view)) ? $this->view : $this->router->directory . $this->router->class . '/' . $this->router->method;

            // Load the view into $yield
            $data['yield'] = $this->load->view($view, $this->data, TRUE);

            // Do we have any asides? Load them.
            if (!empty($this->asides))
            {
                foreach ($this->asides as $name => $file)
                {
                    $data['yield_'.$name] = $this->load->view($file, $this->data, TRUE);
                }
            }

            // Load in our existing data with the asides and view
            $data = array_merge($this->data, $data);
            $layout = FALSE;

            // If we didn't specify the layout, try to guess it
            if (!isset($this->layout))
            {
                if (file_exists(APPPATH . 'views/layouts/' . $this->router->class . '.php'))
                {
                    $layout = 'layouts/' . $this->router->class;
                }
                else
                {
                    $layout = 'layouts/application';
                }
            }

            // If we did, use it
            else if ($this->layout !== FALSE)
            {
                $layout = $this->layout;
            }

            // If $layout is FALSE, we're not interested in loading a layout, so output the view directly
            if ($layout == FALSE)
            {
                $this->output->set_output($data['yield']);
            }

            // Otherwise? Load away :)
            else
            {
                $this->load->view($layout, $data);
            }
        }
    }

    /* --------------------------------------------------------------
     * MODEL LOADING
     * ------------------------------------------------------------ */

    /**
     * Load models based on the $this->models array
     */
    private function _load_models()
    {
        foreach ($this->models as $model)
        {
            $this->load->model($this->_model_name($model), $model);
        }
    }

    /**
     * Returns the loadable model name based on
     * the model formatting string
     */
    protected function _model_name($model)
    {
        return str_replace('%', $model, $this->model_string);
    }

    /* --------------------------------------------------------------
     * HELPER LOADING
     * ------------------------------------------------------------ */

    /**
     * Load helpers based on the $this->helpers array
     */
    private function _load_helpers()
    {
        foreach ($this->helpers as $helper)
        {
            $this->load->helper($helper);
        }
    }
}