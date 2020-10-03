<?php

#index

echo "Generating\033[34m index \033[0m...  ";
system("php generate.php index.md 首页 >index.html");
echo "\033[32m\033[1m✓\033[0m\n";

echo "Generating\033[34m about \033[0m...  ";
system("php generate.php about.md 关于博主 >about.html");
echo "\033[32m\033[1m✓\033[0m\n";

echo "Generating\033[34m link \033[0m...  ";
system("php generate.php link.md 友情链接 >link.html");
echo "\033[32m\033[1m✓\033[0m\n";

echo "Generating\033[34m CC0 \033[0m...  ";
system("php generate.php CC0.md CC0协议 >CC0.html");
echo "\033[32m\033[1m✓\033[0m\n\n";


#post
require_once("content.php");

foreach ($content as $name => $file)
{
    echo "Generating\033[34m $name \033[0m...  ";
    $ht=str_replace(".md",".html",$file);
    system("php generate.php $file $name >$ht");
    echo "\033[32m\033[1m✓\033[0m\n";
}

echo "\n";

foreach ($hack as $name => $file)
{
    echo "Generating\033[34m $name \033[0m...  ";
    $ht=str_replace(".md",".html",$file);
    system("php generate.php $file $name >$ht");
    echo "\033[32m\033[1m✓\033[0m\n";
}
    

?>