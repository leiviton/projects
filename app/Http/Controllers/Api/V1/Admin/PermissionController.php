<?php
/**
 * Created by PhpStorm.
 * User: leviton
 * Date: 17/08/2016
 * Time: 15:26
 */

namespace ApiWebSac\Http\Controllers\Api\V1\Admin;

use ApiWebSac\Http\Controllers\Controller;
use ApiWebSac\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    use UtilTrait;
    /**
     * @var PermissionService
     */
    private $service;

    /**
     * PermissionController constructor.
     * @param PermissionService $service
     */
    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index()
    {
        return $this->service->get();
    }
}
