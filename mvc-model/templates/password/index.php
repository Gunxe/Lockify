<article class="hreview open special">
	
		<?php foreach ($passwords as $password ): ?>
			<div class="r">
				<div class=""><?= $password->title; ?></div>
                <div class=""><?= $password->password; ?></div>
                <div class="">Username: <?= $password->username; ?></div>
			</div>
		<?php endforeach; ?>
        <div class="r">
            <img src="/images/plus.png" alt="plus">
		</div>
</article>
