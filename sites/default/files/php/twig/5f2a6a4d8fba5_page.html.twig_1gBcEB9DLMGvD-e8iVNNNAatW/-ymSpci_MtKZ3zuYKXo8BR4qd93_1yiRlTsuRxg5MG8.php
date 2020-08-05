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

/* themes/plexbasic/templates/layout/page.html.twig */
class __TwigTemplate_cb389618f23fade7412426accec4dccf8fa6c7ea63ea817c5f5336c9d93c11f5 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 68, "set" => 105];
        $filters = ["escape" => 47];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
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
        // line 45
        echo "<div class=\"container\">
  <header>
    ";
        // line 47
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "

    <div class=\"ftco-header-main row d-flex align-items-center \">
      <div class=\"col-md-6 d-flex align-items-center\">
        ";
        // line 51
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "nav_branding", [])), "html", null, true);
        echo "
      </div>
      <div class=\"col-lg-6 d-block d-mr\">
        <div>
          <ul class=\"nav navbar-nav ftco-user-preference\">
            <li class=\"dropdown\">
              <a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                Bienvenido <b class=\"caret\"></b>
              </a>
              <div class=\"dropdown-menu dropdown-menu-right position-absolute\" aria-labelledby=\"navbarDropdown\">
                <a class=\"dropdown-item\" href=\"#\">Accion 1</a>
                <a class=\"dropdown-item\" href=\"#\">Accion 2 </a>
                <div class=\"dropdown-divider\"></div>
                <a class=\"dropdown-item\" href=\"#\">Accion 3</a>
              </div>
            </li>
          </ul>
          ";
        // line 68
        if ($this->getAttribute(($context["page"] ?? null), "nav_user", [])) {
            // line 69
            echo "            ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "nav_user", [])), "html", null, true);
            echo "
          ";
        }
        // line 71
        echo "
        </div>
      </div>
    </div>


    ";
        // line 77
        if ((($this->getAttribute(($context["page"] ?? null), "nav_branding", []) || $this->getAttribute(($context["page"] ?? null), "nav_main", [])) || $this->getAttribute(($context["page"] ?? null), "nav_additional", []))) {
            // line 78
            echo "      <nav class=\"navbar navbar-expand-lg  bg-blue\">
        <div class=\"container d-flex align-items-center\">
          <button class=\"navbar-toggler\"
                  type=\"button\"
                  data-toggle=\"collapse\"
                  data-target=\"#navbarSupportedContent\"
                  aria-controls=\"navbarSupportedContent\"
                  aria-expanded=\"false\"
                  aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
          </button>

          ";
            // line 90
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "nav_additional", [])), "html", null, true);
            echo "

          <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            ";
            // line 93
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "nav_main", [])), "html", null, true);
            echo "
          </div>
        </div>
      </nav>
    ";
        }
        // line 98
        echo "
  </header>

  <main role=\"main\">
    <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 103
        echo "
    ";
        // line 105
        $context["sidebar_first_classes"] = ((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 107
        echo "
    ";
        // line 109
        $context["sidebar_second_classes"] = ((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 111
        echo "
    ";
        // line 113
        $context["content_classes"] = ((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) && $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-lg-6") : (((($this->getAttribute(($context["page"] ?? null), "sidebar_first", []) || $this->getAttribute(($context["page"] ?? null), "sidebar_second", []))) ? ("col-12 col-lg-9") : ("col-12"))));
        // line 115
        echo "

    <div class=\"container\">

      ";
        // line 119
        if ($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])) {
            // line 120
            echo "        ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])), "html", null, true);
            echo "
      ";
        }
        // line 122
        echo "
      <div class=\"row no-gutters\">
        ";
        // line 124
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 125
            echo "          <div class=\"order-2 order-lg-1 ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_classes"] ?? null)), "html", null, true);
            echo "\">
            ";
            // line 126
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 129
        echo "        <div class=\"order-1 order-lg-2 ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_classes"] ?? null)), "html", null, true);
        echo "\">
          ";
        // line 130
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
        </div>
        ";
        // line 132
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 133
            echo "          <div class=\"order-3 ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_classes"] ?? null)), "html", null, true);
            echo "\">
            ";
            // line 134
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 137
        echo "      </div>
    </div>

  </main>

  <footer class=\"ftco-footer ftco-bg-dark ftco-section\">
    <div class=\"container \">
      <div class=\"row mb-1 flex\">
        ";
        // line 145
        if ($this->getAttribute(($context["page"] ?? null), "footer", [])) {
            // line 146
            echo "          ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true);
            echo "
        ";
        }
        // line 148
        echo "
        ";
        // line 149
        if ($this->getAttribute(($context["page"] ?? null), "footer_newsletter", [])) {
            // line 150
            echo "          ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_newsletter", [])), "html", null, true);
            echo "

          <div class=\"col-md-8 \">
            <div class=\"ftco-footer-widget mb-5 ftco-align-center\">
              <h2 class=\"ftco-heading-2\">Subscribete a nuestro newsletter y mantente informado</h2>
              <h3 class=\"ftco-heading-3\">A traves del newsletter podras recibir periodicamente todas nuestras novedades en tu correo</h3>
              <form action=\"#\" class=\"subscribe-form\">
                <div class=\"form-group\">
                  <input type=\"submit\" value=\"Subscribe\" class=\"form-control submit px-3\">
                </div>
              </form>
            </div>
          </div>
        ";
        }
        // line 164
        echo "
      </div>
      <hr>
      <div class=\"row\">
        <div class=\"col-md-5\">
          ";
        // line 169
        if ($this->getAttribute(($context["page"] ?? null), "footer_left", [])) {
            // line 170
            echo "            ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_left", [])), "html", null, true);
            echo "
          ";
        }
        // line 172
        echo "          <p>&copy; <script>document.write(new Date().getFullYear());</script> Instituto de Contabilidad y Auditoria de Cuentas (ICAC)</p>
        </div>
        <div class=\"col-md-7 ftco-left\">
          ";
        // line 175
        if ($this->getAttribute(($context["page"] ?? null), "footer_end", [])) {
            // line 176
            echo "            ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_end", [])), "html", null, true);
            echo "
          ";
        }
        // line 178
        echo "        </div>
      </div>
      ";
        // line 181
        echo "    </div>
  </footer>

  <!-- loader -->
  <div id=\"ftco-loader\" class=\"show fullscreen\"><svg class=\"circular\" width=\"48px\" height=\"48px\"><circle class=\"path-bg\" cx=\"24\" cy=\"24\" r=\"22\" fill=\"none\" stroke-width=\"4\" stroke=\"#eeeeee\"/><circle class=\"path\" cx=\"24\" cy=\"24\" r=\"22\" fill=\"none\" stroke-width=\"4\" stroke-miterlimit=\"10\" stroke=\"#5073a1\"/></svg></div>

</div>
";
    }

    public function getTemplateName()
    {
        return "themes/plexbasic/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  280 => 181,  276 => 178,  270 => 176,  268 => 175,  263 => 172,  257 => 170,  255 => 169,  248 => 164,  230 => 150,  228 => 149,  225 => 148,  219 => 146,  217 => 145,  207 => 137,  201 => 134,  196 => 133,  194 => 132,  189 => 130,  184 => 129,  178 => 126,  173 => 125,  171 => 124,  167 => 122,  161 => 120,  159 => 119,  153 => 115,  151 => 113,  148 => 111,  146 => 109,  143 => 107,  141 => 105,  138 => 103,  132 => 98,  124 => 93,  118 => 90,  104 => 78,  102 => 77,  94 => 71,  88 => 69,  86 => 68,  66 => 51,  59 => 47,  55 => 45,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/plexbasic/templates/layout/page.html.twig", "C:\\xampp\\htdocs\\2020\\icac\\themes\\plexbasic\\templates\\layout\\page.html.twig");
    }
}
