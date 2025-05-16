<?PHP
$urlmenu_xx = "https://Nito.Network/tools/";
echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-primary w-100\">
        <div class=\"container-fluid\">";
if($menu_dirup == 'yes'){
    echo "<a class=\"navbar-brand\" href=\"#\"><img src=\"..\\img\\nito.png\" width=\"50\" height=\"50\"></a>";
}else{
    echo "<a class=\"navbar-brand\" href=\"#\"><img src=\"img\\nito.png\" width=\"50\" height=\"50\"></a>";
}

echo"<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
<span class=\"navbar-toggler-icon\"></span>
 </button>
<div class=\"collapse navbar-collapse\" id=\"navbarNav\">
<ul class=\"navbar-nav\">";


if($menu_select == 'network'){echo "<li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"$urlmenu_xx\">NETWORK</a></li>";
}else{echo "<li class=\"nav-item\"><a class=\"nav-link\" aria-current=\"page\" href=\"$urlmenu_xx\">NETWORK</a></li>";}    

    if($menu_select == 'easynode'){echo "<li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"$urlmenu_xx\\easynode\">EASYNODE</a></li>";
}else{echo "<li class=\"nav-item\"><a class=\"nav-link\" aria-current=\"page\" href=\"$urlmenu_xx\\easynode\">EASYNODE</a></li>";}    

    if($menu_select == 'nitopool'){echo "<li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"$urlmenu_xx\\nitopool\">STRATUM</a></li>";
}else{echo "<li class=\"nav-item\"><a class=\"nav-link\" aria-current=\"page\" href=\"$urlmenu_xx\\nitopool\">STRATUM</a></li>";}
                
echo "</ul></div></div></nav>";
  
?>