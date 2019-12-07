<?php
/**
 * Installation Controller for System First Launch
 * php version 7.2
 * 
 * @category Component
 * @package  Laravel
 * @author   AtraXaz <earltacs96@gmail.com>
 * @license  www.syntacs.com/copyrighted_softwares/project_tracker SynTacs
 * @link     www.syntacs.com 
 */
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
/**
 * Installation Controller for System First Launch
 * php version 7.2
 * 
 * @category Component
 * @package  Laravel
 * @author   AtraXaz <earltacs96@gmail.com>
 * @license  www.syntacs.com/copyrighted_softwares/project_tracker SynTacs
 * @link     www.syntacs.com 
 */
class InstallationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * The index page for the controller
     * 
     * @return view
     */
    public function index()
    {
        return view('auth.insta');
    }
}
