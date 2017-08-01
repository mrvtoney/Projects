<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_7ea5d09f853fb6c52a904887c764e6887c984d69e7badfe04860fd8bc389317c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_405c731d83361cb2389ac947ee7951a93cd0043596839e0c859bdfd1ac756b3e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_405c731d83361cb2389ac947ee7951a93cd0043596839e0c859bdfd1ac756b3e->enter($__internal_405c731d83361cb2389ac947ee7951a93cd0043596839e0c859bdfd1ac756b3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_de757eea7a9c2f02fc6cca722e10c1ff8ca0b55715476e53973503a9bbd403a2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_de757eea7a9c2f02fc6cca722e10c1ff8ca0b55715476e53973503a9bbd403a2->enter($__internal_de757eea7a9c2f02fc6cca722e10c1ff8ca0b55715476e53973503a9bbd403a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_405c731d83361cb2389ac947ee7951a93cd0043596839e0c859bdfd1ac756b3e->leave($__internal_405c731d83361cb2389ac947ee7951a93cd0043596839e0c859bdfd1ac756b3e_prof);

        
        $__internal_de757eea7a9c2f02fc6cca722e10c1ff8ca0b55715476e53973503a9bbd403a2->leave($__internal_de757eea7a9c2f02fc6cca722e10c1ff8ca0b55715476e53973503a9bbd403a2_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_c809ef3356c28dd7d1645f5c37d091ca4d0aa3eac8da33038e39b8f9d411bb9b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c809ef3356c28dd7d1645f5c37d091ca4d0aa3eac8da33038e39b8f9d411bb9b->enter($__internal_c809ef3356c28dd7d1645f5c37d091ca4d0aa3eac8da33038e39b8f9d411bb9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_50516df4bbffebbb66b40cfcd7c3fa7c7d13f49ff7607c1bf5b95d887aed67be = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_50516df4bbffebbb66b40cfcd7c3fa7c7d13f49ff7607c1bf5b95d887aed67be->enter($__internal_50516df4bbffebbb66b40cfcd7c3fa7c7d13f49ff7607c1bf5b95d887aed67be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
";
        
        $__internal_50516df4bbffebbb66b40cfcd7c3fa7c7d13f49ff7607c1bf5b95d887aed67be->leave($__internal_50516df4bbffebbb66b40cfcd7c3fa7c7d13f49ff7607c1bf5b95d887aed67be_prof);

        
        $__internal_c809ef3356c28dd7d1645f5c37d091ca4d0aa3eac8da33038e39b8f9d411bb9b->leave($__internal_c809ef3356c28dd7d1645f5c37d091ca4d0aa3eac8da33038e39b8f9d411bb9b_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_5f2e1c5379fc7d3d2b536fbd4eb177d5520151db067ece87dc4965f89de34791 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5f2e1c5379fc7d3d2b536fbd4eb177d5520151db067ece87dc4965f89de34791->enter($__internal_5f2e1c5379fc7d3d2b536fbd4eb177d5520151db067ece87dc4965f89de34791_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_1a0a53cb0bed51c2c1a2401f4ec59e6f7629f3237f80f8420f6d88d616a17b58 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1a0a53cb0bed51c2c1a2401f4ec59e6f7629f3237f80f8420f6d88d616a17b58->enter($__internal_1a0a53cb0bed51c2c1a2401f4ec59e6f7629f3237f80f8420f6d88d616a17b58_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_1a0a53cb0bed51c2c1a2401f4ec59e6f7629f3237f80f8420f6d88d616a17b58->leave($__internal_1a0a53cb0bed51c2c1a2401f4ec59e6f7629f3237f80f8420f6d88d616a17b58_prof);

        
        $__internal_5f2e1c5379fc7d3d2b536fbd4eb177d5520151db067ece87dc4965f89de34791->leave($__internal_5f2e1c5379fc7d3d2b536fbd4eb177d5520151db067ece87dc4965f89de34791_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_bb3ec6cec0a70381c3b2c260fb6dab65c35c9fa51cd2780a7a5c3c6f7b030da6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bb3ec6cec0a70381c3b2c260fb6dab65c35c9fa51cd2780a7a5c3c6f7b030da6->enter($__internal_bb3ec6cec0a70381c3b2c260fb6dab65c35c9fa51cd2780a7a5c3c6f7b030da6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_f5738f24150ad2434fcdf521e5b2fe4b6ad2c1de8580915ec7cafe28637d2294 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f5738f24150ad2434fcdf521e5b2fe4b6ad2c1de8580915ec7cafe28637d2294->enter($__internal_f5738f24150ad2434fcdf521e5b2fe4b6ad2c1de8580915ec7cafe28637d2294_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_f5738f24150ad2434fcdf521e5b2fe4b6ad2c1de8580915ec7cafe28637d2294->leave($__internal_f5738f24150ad2434fcdf521e5b2fe4b6ad2c1de8580915ec7cafe28637d2294_prof);

        
        $__internal_bb3ec6cec0a70381c3b2c260fb6dab65c35c9fa51cd2780a7a5c3c6f7b030da6->leave($__internal_bb3ec6cec0a70381c3b2c260fb6dab65c35c9fa51cd2780a7a5c3c6f7b030da6_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 141,  217 => 140,  200 => 137,  191 => 136,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "/Users/vincent/fortune_builders/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
