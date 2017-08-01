<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_e7b37af55e736a4b2951327e39174e059fc81b8b564c64b2723f2f6e6760b452 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2dae432ff7e649d4081effb6addf867981f85b031fd1ee338ed30b6a5695c2fb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_2dae432ff7e649d4081effb6addf867981f85b031fd1ee338ed30b6a5695c2fb->enter($__internal_2dae432ff7e649d4081effb6addf867981f85b031fd1ee338ed30b6a5695c2fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_8aa647c4f8ad2897244a2d7a94c4f6431c7dad75f5b71415fe82ed36ca21c4aa = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8aa647c4f8ad2897244a2d7a94c4f6431c7dad75f5b71415fe82ed36ca21c4aa->enter($__internal_8aa647c4f8ad2897244a2d7a94c4f6431c7dad75f5b71415fe82ed36ca21c4aa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        echo twig_include($this->env, $context, "@Twig/images/favicon.png.base64");
        echo "\">
        <style>";
        // line 9
        echo twig_include($this->env, $context, "@Twig/exception.css.twig");
        echo "</style>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">";
        // line 15
        echo twig_include($this->env, $context, "@Twig/images/symfony-logo.svg");
        echo " Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">";
        // line 19
        echo twig_include($this->env, $context, "@Twig/images/icon-book.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">";
        // line 26
        echo twig_include($this->env, $context, "@Twig/images/icon-support.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "        ";
        echo twig_include($this->env, $context, "@Twig/base_js.html.twig");
        echo "
    </body>
</html>
";
        
        $__internal_2dae432ff7e649d4081effb6addf867981f85b031fd1ee338ed30b6a5695c2fb->leave($__internal_2dae432ff7e649d4081effb6addf867981f85b031fd1ee338ed30b6a5695c2fb_prof);

        
        $__internal_8aa647c4f8ad2897244a2d7a94c4f6431c7dad75f5b71415fe82ed36ca21c4aa->leave($__internal_8aa647c4f8ad2897244a2d7a94c4f6431c7dad75f5b71415fe82ed36ca21c4aa_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_c541240acbd27d0b82d9733f8bca0627d21a14367765ac90a45b9be185e1f0a3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c541240acbd27d0b82d9733f8bca0627d21a14367765ac90a45b9be185e1f0a3->enter($__internal_c541240acbd27d0b82d9733f8bca0627d21a14367765ac90a45b9be185e1f0a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_e2e62dd3964a8f57e60cc3f18785ea2071323dc025c7ba502e5bb6cb8515df9e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e2e62dd3964a8f57e60cc3f18785ea2071323dc025c7ba502e5bb6cb8515df9e->enter($__internal_e2e62dd3964a8f57e60cc3f18785ea2071323dc025c7ba502e5bb6cb8515df9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_e2e62dd3964a8f57e60cc3f18785ea2071323dc025c7ba502e5bb6cb8515df9e->leave($__internal_e2e62dd3964a8f57e60cc3f18785ea2071323dc025c7ba502e5bb6cb8515df9e_prof);

        
        $__internal_c541240acbd27d0b82d9733f8bca0627d21a14367765ac90a45b9be185e1f0a3->leave($__internal_c541240acbd27d0b82d9733f8bca0627d21a14367765ac90a45b9be185e1f0a3_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_9c637266f43783308ae0029381fa99e0a37e15d609cf73dc84c3491cf127b30a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9c637266f43783308ae0029381fa99e0a37e15d609cf73dc84c3491cf127b30a->enter($__internal_9c637266f43783308ae0029381fa99e0a37e15d609cf73dc84c3491cf127b30a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_5977398660998acd5b1c39e395205db98cdbf222596f269eec4f4d999430953e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5977398660998acd5b1c39e395205db98cdbf222596f269eec4f4d999430953e->enter($__internal_5977398660998acd5b1c39e395205db98cdbf222596f269eec4f4d999430953e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_5977398660998acd5b1c39e395205db98cdbf222596f269eec4f4d999430953e->leave($__internal_5977398660998acd5b1c39e395205db98cdbf222596f269eec4f4d999430953e_prof);

        
        $__internal_9c637266f43783308ae0029381fa99e0a37e15d609cf73dc84c3491cf127b30a->leave($__internal_9c637266f43783308ae0029381fa99e0a37e15d609cf73dc84c3491cf127b30a_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_d33718483749768c326684436f708523deea871ff0b1d79975a0986f89bc4a19 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d33718483749768c326684436f708523deea871ff0b1d79975a0986f89bc4a19->enter($__internal_d33718483749768c326684436f708523deea871ff0b1d79975a0986f89bc4a19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_f7a14a870c30f3c1fbb30b80ab024c6cc87391e26e371664f582e85daf19e6b1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f7a14a870c30f3c1fbb30b80ab024c6cc87391e26e371664f582e85daf19e6b1->enter($__internal_f7a14a870c30f3c1fbb30b80ab024c6cc87391e26e371664f582e85daf19e6b1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_f7a14a870c30f3c1fbb30b80ab024c6cc87391e26e371664f582e85daf19e6b1->leave($__internal_f7a14a870c30f3c1fbb30b80ab024c6cc87391e26e371664f582e85daf19e6b1_prof);

        
        $__internal_d33718483749768c326684436f708523deea871ff0b1d79975a0986f89bc4a19->leave($__internal_d33718483749768c326684436f708523deea871ff0b1d79975a0986f89bc4a19_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 33,  120 => 10,  103 => 7,  88 => 34,  86 => 33,  76 => 26,  66 => 19,  59 => 15,  53 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  33 => 4,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"{{ _charset }}\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>{% block title %}{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ include('@Twig/images/favicon.png.base64') }}\">
        <style>{{ include('@Twig/exception.css.twig') }}</style>
        {% block head %}{% endblock %}
    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">{{ include('@Twig/images/symfony-logo.svg') }} Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-book.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-support.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        {% block body %}{% endblock %}
        {{ include('@Twig/base_js.html.twig') }}
    </body>
</html>
", "@Twig/layout.html.twig", "/Users/vincent/fortune_builders/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/layout.html.twig");
    }
}
