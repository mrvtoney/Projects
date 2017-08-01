<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_870d0c643a20c61e01c9c29c7b691d9aa79e57fe252edc07393c555e0a644cfe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_66e597d595918cdf4f32e95cee2166cfd49bff841f89394ef5a17b96bebd57f5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_66e597d595918cdf4f32e95cee2166cfd49bff841f89394ef5a17b96bebd57f5->enter($__internal_66e597d595918cdf4f32e95cee2166cfd49bff841f89394ef5a17b96bebd57f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_e5c2215db4d05b79ffac471396b54536ab49db8aad4283748166e0e0808ed70c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e5c2215db4d05b79ffac471396b54536ab49db8aad4283748166e0e0808ed70c->enter($__internal_e5c2215db4d05b79ffac471396b54536ab49db8aad4283748166e0e0808ed70c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_66e597d595918cdf4f32e95cee2166cfd49bff841f89394ef5a17b96bebd57f5->leave($__internal_66e597d595918cdf4f32e95cee2166cfd49bff841f89394ef5a17b96bebd57f5_prof);

        
        $__internal_e5c2215db4d05b79ffac471396b54536ab49db8aad4283748166e0e0808ed70c->leave($__internal_e5c2215db4d05b79ffac471396b54536ab49db8aad4283748166e0e0808ed70c_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_eb9a7468035edfd30c988ded0ca5a2ee5d4526af9c952c68697ac626d630769d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_eb9a7468035edfd30c988ded0ca5a2ee5d4526af9c952c68697ac626d630769d->enter($__internal_eb9a7468035edfd30c988ded0ca5a2ee5d4526af9c952c68697ac626d630769d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_f05787096a071bd9a66ed14f5c765628eb8d6f0ae7d4d73ab3d270b870e04a03 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f05787096a071bd9a66ed14f5c765628eb8d6f0ae7d4d73ab3d270b870e04a03->enter($__internal_f05787096a071bd9a66ed14f5c765628eb8d6f0ae7d4d73ab3d270b870e04a03_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_f05787096a071bd9a66ed14f5c765628eb8d6f0ae7d4d73ab3d270b870e04a03->leave($__internal_f05787096a071bd9a66ed14f5c765628eb8d6f0ae7d4d73ab3d270b870e04a03_prof);

        
        $__internal_eb9a7468035edfd30c988ded0ca5a2ee5d4526af9c952c68697ac626d630769d->leave($__internal_eb9a7468035edfd30c988ded0ca5a2ee5d4526af9c952c68697ac626d630769d_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_d9867dce20a8b6775653c63dd25c3d7d06a07c273bb80fc3ae556ef0938b823b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d9867dce20a8b6775653c63dd25c3d7d06a07c273bb80fc3ae556ef0938b823b->enter($__internal_d9867dce20a8b6775653c63dd25c3d7d06a07c273bb80fc3ae556ef0938b823b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_40a10859b6c02669aad3b59eed78ff5c6f756e19093213d6c1c1f5ad24df521b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_40a10859b6c02669aad3b59eed78ff5c6f756e19093213d6c1c1f5ad24df521b->enter($__internal_40a10859b6c02669aad3b59eed78ff5c6f756e19093213d6c1c1f5ad24df521b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_40a10859b6c02669aad3b59eed78ff5c6f756e19093213d6c1c1f5ad24df521b->leave($__internal_40a10859b6c02669aad3b59eed78ff5c6f756e19093213d6c1c1f5ad24df521b_prof);

        
        $__internal_d9867dce20a8b6775653c63dd25c3d7d06a07c273bb80fc3ae556ef0938b823b->leave($__internal_d9867dce20a8b6775653c63dd25c3d7d06a07c273bb80fc3ae556ef0938b823b_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_df3a66fccacf80d2a6add395fb61c4a735acff887c2f449a7e0b7f72824c85f2 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_df3a66fccacf80d2a6add395fb61c4a735acff887c2f449a7e0b7f72824c85f2->enter($__internal_df3a66fccacf80d2a6add395fb61c4a735acff887c2f449a7e0b7f72824c85f2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_11b3fe183869ff1accbdfade8b17e8046774d0ab00b15c7f2b3bddf4d8dd4b81 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_11b3fe183869ff1accbdfade8b17e8046774d0ab00b15c7f2b3bddf4d8dd4b81->enter($__internal_11b3fe183869ff1accbdfade8b17e8046774d0ab00b15c7f2b3bddf4d8dd4b81_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_11b3fe183869ff1accbdfade8b17e8046774d0ab00b15c7f2b3bddf4d8dd4b81->leave($__internal_11b3fe183869ff1accbdfade8b17e8046774d0ab00b15c7f2b3bddf4d8dd4b81_prof);

        
        $__internal_df3a66fccacf80d2a6add395fb61c4a735acff887c2f449a7e0b7f72824c85f2->leave($__internal_df3a66fccacf80d2a6add395fb61c4a735acff887c2f449a7e0b7f72824c85f2_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
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

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/Users/vincent/fortune_builders/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
