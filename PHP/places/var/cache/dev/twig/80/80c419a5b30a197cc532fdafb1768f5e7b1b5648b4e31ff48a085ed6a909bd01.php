<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_9037bff020a62cf2e25ea6066d13be5145063340ffc369fe6da5c36190d72bc6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_679bcfb4e7197c7b8ae9075272e50e45bcc6f701b116bdb90fdac26e6e2a6755 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_679bcfb4e7197c7b8ae9075272e50e45bcc6f701b116bdb90fdac26e6e2a6755->enter($__internal_679bcfb4e7197c7b8ae9075272e50e45bcc6f701b116bdb90fdac26e6e2a6755_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_bf66989d31352d32d1b0fb3318796f507edb9e92d32d50ec80c66981e9309567 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bf66989d31352d32d1b0fb3318796f507edb9e92d32d50ec80c66981e9309567->enter($__internal_bf66989d31352d32d1b0fb3318796f507edb9e92d32d50ec80c66981e9309567_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_679bcfb4e7197c7b8ae9075272e50e45bcc6f701b116bdb90fdac26e6e2a6755->leave($__internal_679bcfb4e7197c7b8ae9075272e50e45bcc6f701b116bdb90fdac26e6e2a6755_prof);

        
        $__internal_bf66989d31352d32d1b0fb3318796f507edb9e92d32d50ec80c66981e9309567->leave($__internal_bf66989d31352d32d1b0fb3318796f507edb9e92d32d50ec80c66981e9309567_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_a513da8d92f7be1c03def77486054f17f6908e84b1821dfc8adce672ed458758 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a513da8d92f7be1c03def77486054f17f6908e84b1821dfc8adce672ed458758->enter($__internal_a513da8d92f7be1c03def77486054f17f6908e84b1821dfc8adce672ed458758_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_9183c25be7502efb1dc005840f05fb8c47a1ffc1b85609c355892c256febd908 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9183c25be7502efb1dc005840f05fb8c47a1ffc1b85609c355892c256febd908->enter($__internal_9183c25be7502efb1dc005840f05fb8c47a1ffc1b85609c355892c256febd908_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_9183c25be7502efb1dc005840f05fb8c47a1ffc1b85609c355892c256febd908->leave($__internal_9183c25be7502efb1dc005840f05fb8c47a1ffc1b85609c355892c256febd908_prof);

        
        $__internal_a513da8d92f7be1c03def77486054f17f6908e84b1821dfc8adce672ed458758->leave($__internal_a513da8d92f7be1c03def77486054f17f6908e84b1821dfc8adce672ed458758_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_6ae0236e652fab698a894454a64e893d5f0e2115f5b083930679c083d6fe9124 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_6ae0236e652fab698a894454a64e893d5f0e2115f5b083930679c083d6fe9124->enter($__internal_6ae0236e652fab698a894454a64e893d5f0e2115f5b083930679c083d6fe9124_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_00e7f3f5247e2c16e87369013dfc476db40e4bad629fa3165b89fc78459e8119 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_00e7f3f5247e2c16e87369013dfc476db40e4bad629fa3165b89fc78459e8119->enter($__internal_00e7f3f5247e2c16e87369013dfc476db40e4bad629fa3165b89fc78459e8119_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_00e7f3f5247e2c16e87369013dfc476db40e4bad629fa3165b89fc78459e8119->leave($__internal_00e7f3f5247e2c16e87369013dfc476db40e4bad629fa3165b89fc78459e8119_prof);

        
        $__internal_6ae0236e652fab698a894454a64e893d5f0e2115f5b083930679c083d6fe9124->leave($__internal_6ae0236e652fab698a894454a64e893d5f0e2115f5b083930679c083d6fe9124_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_5e491235ab2f41b5bf629fd83e00ed20d13ac121b8103e2e1c5dc6b3b0ab7967 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_5e491235ab2f41b5bf629fd83e00ed20d13ac121b8103e2e1c5dc6b3b0ab7967->enter($__internal_5e491235ab2f41b5bf629fd83e00ed20d13ac121b8103e2e1c5dc6b3b0ab7967_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_0c7c89fa7163b914c8133e08c905812499728740925d90f9f9c459cb276143d9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0c7c89fa7163b914c8133e08c905812499728740925d90f9f9c459cb276143d9->enter($__internal_0c7c89fa7163b914c8133e08c905812499728740925d90f9f9c459cb276143d9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_0c7c89fa7163b914c8133e08c905812499728740925d90f9f9c459cb276143d9->leave($__internal_0c7c89fa7163b914c8133e08c905812499728740925d90f9f9c459cb276143d9_prof);

        
        $__internal_5e491235ab2f41b5bf629fd83e00ed20d13ac121b8103e2e1c5dc6b3b0ab7967->leave($__internal_5e491235ab2f41b5bf629fd83e00ed20d13ac121b8103e2e1c5dc6b3b0ab7967_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
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

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/Users/vincent/fortune_builders/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}
