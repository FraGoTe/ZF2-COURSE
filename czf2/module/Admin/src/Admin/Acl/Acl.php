<?php

namespace Admin\Acl;

class Acl {
    
    protected $sl;
    
    /**
     *
     * @var \Zend\Permissions\Acl\Acl
     */
    protected $zendAcl;
    
    /**
     *
     * @var \Zend\Authentication\AuthenticationService
     */
    protected $auth;
    
    public function __construct($sl) {
        $this->sl = $sl;
        $this->zendAcl = $sl->get('Zend\Permissions\Acl\Acl');
        
        if($this->auth==null){
            $this->auth = $sl->get('AuthService');
        }
    }
    
    
    /**
     * @param type $perm
     * @param type $recurso
     * @return boolean
     */
    public function puedo($perm, $recurso){
        if(!$this->auth->hasIdentity()){
            return false;
        }
        $storage = $this->auth->getStorage()->read();
        return $this->zendAcl->isAllowed($storage->tipo, $recurso, $perm);
    }
    
    
}
