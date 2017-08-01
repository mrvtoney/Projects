<?php

/* @WebProfiler/Collector/ajax.html.twig */
class __TwigTemplate_a23c034c65cd04f10b3d2c05291c63a038f54baac7db01d05b8b9aefe9939e1b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/ajax.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2aaf3b4c5a7d149abf1a0d80f756ec713e4d61a5965f86daa9dca9c9aeeffce6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2aaf3b4c5a7d149abf1a0d80f756ec713e4d61a5965f86daa9dca9c9aeeffce6->enter($__internal_2aaf3b4c5a7d149abf1a0d80f756ec713e4d61a5965f86daa9dca9c9aeeffce6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $__internal_dea5090937c52cebcc913a75dc584dbf3618fb86beae8abf146c5a45b873084c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_dea5090937c52cebcc913a75dc584dbf3618fb86beae8abf146c5a45b873084c->enter($__internal_dea5090937c52cebcc913a75dc584dbf3618fb86beae8abf146c5a45b873084c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/ajax.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2aaf3b4c5a7d149abf1a0d80f756ec713e4d61a5965f86daa9dca9c9aeeffce6->leave($__internal_2aaf3b4c5a7d149abf1a0d80f756ec713e4d61a5965f86daa9dca9c9aeeffce6_prof);

        
        $__internal_dea5090937c52cebcc913a75dc584dbf3618fb86beae8abf146c5a45b873084c->leave($__internal_dea5090937c52cebcc913a75dc584dbf3618fb86beae8abf146c5a45b873084c_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_ba3339e0001ed716d7590fe5f77214b6365e36084402bdbbfc102daae65f553d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ba3339e0001ed716d7590fe5f77214b6365e36084402bdbbfc102daae65f553d->enter($__internal_ba3339e0001ed716d7590fe5f77214b6365e36084402bdbbfc102daae65f553d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_966da01a6a54bdfb5a95f1844eeb462848b4ef8277301c835a8050091a804e3e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_966da01a6a54bdfb5a95f1844eeb462848b4ef8277301c835a8050091a804e3e->enter($__internal_966da01a6a54bdfb5a95f1844eeb462848b4ef8277301c835a8050091a804e3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        echo twig_include($this->env, $context, "@WebProfiler/Icon/ajax.svg");
        echo "
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "
    ";
        // line 9
        $context["text"] = ('' === $tmp = "        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
    ";
        // line 30
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => false));
        echo "
";
        
        $__internal_966da01a6a54bdfb5a95f1844eeb462848b4ef8277301c835a8050091a804e3e->leave($__internal_966da01a6a54bdfb5a95f1844eeb462848b4ef8277301c835a8050091a804e3e_prof);

        
        $__internal_ba3339e0001ed716d7590fe5f77214b6365e36084402bdbbfc102daae65f553d->leave($__internal_ba3339e0001ed716d7590fe5f77214b6365e36084402bdbbfc102daae65f553d_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 30,  82 => 29,  62 => 9,  59 => 8,  52 => 5,  49 => 4,  40 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% set icon %}
        {{ include('@WebProfiler/Icon/ajax.svg') }}
        <span class=\"sf-toolbar-value sf-toolbar-ajax-request-counter\">0</span>
    {% endset %}

    {% set text %}
        <div class=\"sf-toolbar-info-piece\">
            <b class=\"sf-toolbar-ajax-info\"></b>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <table class=\"sf-toolbar-ajax-requests\">
                <thead>
                    <tr>
                        <th>Method</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Time</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody class=\"sf-toolbar-ajax-request-list\"></tbody>
            </table>
        </div>
    {% endset %}

    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: false }) }}
{% endblock %}
", "@WebProfiler/Collector/ajax.html.twig", "/Users/vincent/fortune_builders/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/ajax.html.twig");
    }
}
