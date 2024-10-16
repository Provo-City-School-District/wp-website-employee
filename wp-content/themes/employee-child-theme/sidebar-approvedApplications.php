<aside id="sidebar" class="sidebar">
		<?php
			if(!is_single()){
				?>
<label for="appsearch" class="visuallyhidden" id="appSearch">Approved Apps Search: </label>
	        <input type="text" name="appsearch" class="text-input" aria-labelledby="directorySearch" id="appfilter" value="" placeholder="Search Apps..." />
	        <img id="directorySearchIcon" src="//globalassets.provo.edu/image/icons/search-lt.svg" alt="" />
				<?php
			}
		?>	
			
	
		<ul class="imagelist">
			<li>
				<a href="https://employee.provo.edu/technology/submit-a-new-application/">
					<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
					<span>Submit a New App</span>
				</a>
			</li>
			<li>
				<a href="https://employee.provo.edu/technology/approved-applications/">
					<img src="//globalassets.provo.edu/image/icons/progress-lt.svg" alt="" />
					<span>Approved Apps</span>
				</a>
			</li>
			<li>
				<a href="https://employee.provo.edu/technology/denied-applications/">
					<img src="//globalassets.provo.edu/image/icons/login-lt.svg" alt="" />
					<span>Denied Apps</span>
				</a>
			</li>
			<li>
				<a href="https://employee.provo.edu/technology/pending-applications/">
					<img src="//globalassets.provo.edu/image/icons/maintenance-lt.svg" alt="" />
					<span>Pending Apps</span>
				</a>
			</li>
		</ul>
	<h2>App Categories</h2>
		<ul class="imagelist">
			<li><a href="https://employee.provo.edu/app_type/art-apps/">
				<img src="//globalassets.provo.edu/image/icons/form-lt.svg" alt="" />
				<span>Art Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/computer-science-coding-apps/">
				<img src="//globalassets.provo.edu/image/icons/employee-access-lt.svg" alt="" />
				<span>Computer Science/Coding Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/foreign-language-apps/">
				<img src="//globalassets.provo.edu/image/icons/student-lt.svg" alt="" />
				<span>Foreign Language Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/home-school-communication-apps/">
				<img src="//globalassets.provo.edu/image/icons/parent-academy-lt.svg" alt="" />
				<span>Home/School Communication Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/language-arts/">
				<img src="//globalassets.provo.edu/image/icons/open-book.svg" alt="" />
				<span>Language Arts</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/math-apps/">
				<img src="//globalassets.provo.edu/image/icons/business-lt.svg" alt="" />
				<span>Math Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/music-apps/">
				<img src="//globalassets.provo.edu/image/icons/news-white.svg" alt="" />
				<span>Music Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/other-apps/">
				<img src="//globalassets.provo.edu/image/icons/teaching-lt.svg" alt="" />
				<span>Other Apps</span>
				</a>
			</li>
			
			<li><a href="https://employee.provo.edu/app_type/science-apps/">
				<img src="//globalassets.provo.edu/image/icons/provoway.svg" alt="" />
				<span>Science Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/social-studies-apps/">
				<img src="//globalassets.provo.edu/image/icons/family.svg" alt="" />
				<span>Social Studies Apps</span>
				</a>
			</li>
			<li><a href="https://employee.provo.edu/app_type/typing-apps/">
				<img src="//globalassets.provo.edu/image/icons/special-lt.svg" alt="" />
				<span>Typing Apps</span>
				</a>
			</li>
		</ul>
	<h2>Data Privacy Contacts</h2>
		<?php
			echo do_shortcode('[directory url="https://provo.edu/directory_page/administrative-building-student-data/"]');
		?>
</aside>