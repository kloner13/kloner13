<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/plexbasic/templates/block/block--system-menu-block--sub-footer.html.twig */
class __TwigTemplate_c2449418b7e07084b10172ee3bfd590c22bf3c2d6c26d372173ba62972b04701 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["block" => 37];
        $filters = ["escape" => 38];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['block'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 34
        echo "

";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 40
        echo "
";
    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        // line 38
        echo "    ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null)), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/plexbasic/templates/block/block--system-menu-block--sub-footer.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  70 => 38,  67 => 37,  62 => 40,  60 => 37,  56 => 34,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/plexbasic/templates/block/block--system-menu-block--sub-footer.html.twig", "C:\\xampp\\htdocs\\2020\\icac\\themes\\plexbasic\\templates\\block\\block--system-menu-block--sub-footer.html.twig");
    }
}
