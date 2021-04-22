<article class="hreview open special">
	
		<?php foreach ($passwords as $password ): ?>
			<div class="r" onclick="document.location.href='/password/show?id=<?=$password->id?>'">
				<div class=""><?= $password->title; ?></div>
                <div class=""><?= $password->password;  ?></div>
                <div class="">Username: <?= $password->username; ?></div>
			</div>
		<?php endforeach; ?>
        <div class="r">
            <img src="/images/plus.png"  alt="plus" onclick="document.location.href='/password/create/index.php'">
		</div>
</article>


<script src="/path/to/jQuery.js"></script>
<script>
    (function($) {
        $( document ).ready( function() {
            
            // Bevor die Funktion "bind" aufgerufen wird sollte man immer zuvor ein "unbind" auf das gleiche Element anwenden um zu verhindern, dass durch einen Logik-Fehler ein Doppel-Ereignis ausgelöst wird
            $( '#generate_pw' ).unbind( 'click' );
            $( '#generate_pw' ).bind( 'click', function() {
                
                // Der Aufruf unserer Funktion zum Erstellen eines Passworts wird hier eingefügt. Sollte es eine zweite Möglichkeit zum Aufruf der Funktion geben können wir die Funktion generate_password() dort ebenfalls hinterlegen.
                generate_password();
                
            });
            
            function generate_password() {
                
                // Hier werden die Einstellungen ausgelesen und das Passwort generiert
                
            }
            
            // Diese Erweiterung des Strings werden wir später beim Passwort-Generieren benötigen. Durch die shuffle-Funktion wird ein vorhandener String gemischt
            String.prototype.shuffle = function() {
                var chars = this.split( "" );
                var length = chars.length;
                
                for( var i = length-1; i > 0; i-- ) {
                    var j = Math.floor( Math.random() * ( i + 1 ) );
                    var tmp = chars[ i ];
                    chars[ i ] = chars[ j ];
                    chars[ j ] = tmp;
                }
                return chars.join( "" );
            }
            
        });
    })(jQuery);
</script>
