<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Gui\Communication\Form;

use Spryker\Zed\Application\Communication\Plugin\Pimple;
use Spryker\Zed\Gui\Communication\Plugin\ConstraintsPlugin;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Shared\Gui\Form\AbstractForm as SharedAbstractForm;

/**
 * @deprecated Use \Symfony\Component\Form\AbstractType instead.
 */
abstract class AbstractForm extends SharedAbstractForm
{

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var \Spryker\Zed\Gui\Communication\Plugin\ConstraintsPlugin
     */
    protected $constraintsPlugin;

    /**
     * @return \Spryker\Zed\Gui\Communication\Plugin\ConstraintsPlugin
     */
    public function getConstraints()
    {
        if ($this->constraintsPlugin === null) {
            $this->constraintsPlugin = new ConstraintsPlugin();
        }

        return $this->constraintsPlugin;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        if ($this->request === null) {
            $this->request = (new Pimple())->getApplication()['request'];
        }

        return $this->request;
    }

}