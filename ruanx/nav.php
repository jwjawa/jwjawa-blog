<nav class="menu menu-left nav-drawer nav-drawer-md" id="ui_menu">
		<div class="menu-scroll">
			<div class="menu-content">
				<a class="menu-logo" href="/ruanx/index.html">blue的博客</a>
				<ul class="nav">
					<li>
						<a class="collapsed waves-attach waves-effect" data-toggle="collapse" href="#posts">OI笔记</a>	
						<ul class="menu-collapse collapse in" id="posts">
						
							<?php

							require_once("content.php");

							foreach ($content as $name => $file)
							{
								$file = str_replace(".md",".html",$file);

								if($name == $argv[2]) echo 
							"<li class=\"active\">
								<a class=\"waves-attach\" href=\"/ruanx/$file\">$name</a>
							</li>";
								else echo 
							"<li>
								<a class=\"waves-attach\" href=\"/ruanx/$file\">$name</a>
							</li>";
							}

							?>
						</ul>

						<a class="collapsed waves-attach waves-effect" data-toggle="collapse" href="#hack">渗透日志</a>	
						<ul class="menu-collapse collapse in" id="hack">
							
							<?php

							foreach ($hack as $name => $file)
							{
								$file = str_replace(".md",".html",$file);

								if($name == $argv[2]) echo 
							"<li class=\"active\">
								<a class=\"waves-attach\" href=\"/ruanx/$file\">$name</a>
							</li>";
								else echo 
							"<li>
								<a class=\"waves-attach\" href=\"/ruanx/$file\">$name</a>
							</li>";
							}

							?>
						</ul>

					</li>
					
				</ul>
			</div>
		</div>
	</nav>
