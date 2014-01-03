<?php

/* WyskoczBundle:Default:index.html.twig */
class __TwigTemplate_47c62c5dc95a37e4d09137d00826f1184d102c7740cfb559d0bb84a1923d025c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Strona glowna";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "    <h1>Index</h1>
    <p class=\"important\">
        Welcome on my awesome homepage.
    </p>
";
    }

    public function getTemplateName()
    {
        return "WyskoczBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 5,  35 => 4,  29 => 3,);
    }
}
