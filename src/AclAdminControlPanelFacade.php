<?php
namespace Meccado\AclAdminControlPanel;
use Illuminate\Support\Facades\Facade;

class AclAdminControlPanelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'acl';
    }
}
