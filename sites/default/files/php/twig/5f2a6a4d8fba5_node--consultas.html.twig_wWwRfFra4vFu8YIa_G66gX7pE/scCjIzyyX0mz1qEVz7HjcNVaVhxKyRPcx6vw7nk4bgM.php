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

/* themes/plexbasic/templates/content/node--consultas.html.twig */
class __TwigTemplate_ca9a1277856eedd85144df10bd855fbdf86f8d3655c4c6685980ab16ea9dc41d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 74, "if" => 88];
        $filters = ["clean_class" => 77, "escape" => 84, "t" => 100, "format_date" => 101];
        $functions = ["attach_library" => 84, "url" => 124];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 't', 'format_date'],
                ['attach_library', 'url']
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
        // line 74
        $context["classes"] = [0 => "node", 1 => "auditoria", 2 => ("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($this->getAttribute(        // line 77
($context["node"] ?? null), "bundle", [])))), 3 => (($this->getAttribute(        // line 78
($context["node"] ?? null), "isPromoted", [], "method")) ? ("node--promoted") : ("")), 4 => (($this->getAttribute(        // line 79
($context["node"] ?? null), "isSticky", [], "method")) ? ("node--sticky") : ("")), 5 => (( !$this->getAttribute(        // line 80
($context["node"] ?? null), "isPublished", [], "method")) ? ("node--unpublished") : ("")), 6 => ((        // line 81
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null))))) : (""))];
        // line 84
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("classy/node"), "html", null, true);
        echo "
<article";
        // line 85
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">

  ";
        // line 87
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null)), "html", null, true);
        echo "
  ";
        // line 88
        if ((($context["label"] ?? null) &&  !($context["page"] ?? null))) {
            // line 89
            echo "    <h2";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null)), "html", null, true);
            echo ">
      <a href=\"";
            // line 90
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null)), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
            echo "</a>
    </h2>
  ";
        }
        // line 93
        echo "  ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null)), "html", null, true);
        echo "

  <hr />

  <div";
        // line 97
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content_attributes"] ?? null), "addClass", [0 => "node__content"], "method")), "html", null, true);
        echo ">
    ";
        // line 98
        if (($context["date"] ?? null)) {
            // line 99
            echo "      <div class=\"field-look date\">
        <label>";
            // line 100
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Fecha:"));
            echo "</label>
        ";
            // line 101
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFilter('format_date')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute(($context["node"] ?? null), "getCreatedTime", [], "method")), "custom", "d-m-Y"]), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 104
        echo "
    ";
        // line 105
        if ($this->getAttribute(($context["content"] ?? null), "field_com_numboicac", [])) {
            // line 106
            echo "      <div class=\"field-look\">
        ";
            // line 107
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_com_numboicac", [])), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 110
        echo "
    
    ";
        // line 112
        if ($this->getAttribute(($context["content"] ?? null), "field_com_publicada", [])) {
            // line 113
            echo "      <div class=\"field-look\">
        ";
            // line 114
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_com_publicada", [])), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 117
        echo "
    ";
        // line 118
        if ($this->getAttribute(($context["content"] ?? null), "field_com_resppublicada", [])) {
            // line 119
            echo "      <div class=\"field-look\">
        ";
            // line 120
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_com_resppublicada", [])), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 123
        echo "
    <a href=\"";
        // line 124
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("view.criterios_de_supervision.page_1"));
        echo "\" class=\"btn-view-more\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Ver todos las Consultas"));
        echo "</a>
  </div>

</article>
";
    }

    public function getTemplateName()
    {
        return "themes/plexbasic/templates/content/node--consultas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 124,  160 => 123,  154 => 120,  151 => 119,  149 => 118,  146 => 117,  140 => 114,  137 => 113,  135 => 112,  131 => 110,  125 => 107,  122 => 106,  120 => 105,  117 => 104,  111 => 101,  107 => 100,  104 => 99,  102 => 98,  98 => 97,  90 => 93,  82 => 90,  77 => 89,  75 => 88,  71 => 87,  66 => 85,  62 => 84,  60 => 81,  59 => 80,  58 => 79,  57 => 78,  56 => 77,  55 => 74,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/plexbasic/templates/content/node--consultas.html.twig", "C:\\xampp\\htdocs\\2020\\icac\\themes\\plexbasic\\templates\\content\\node--consultas.html.twig");
    }
}
