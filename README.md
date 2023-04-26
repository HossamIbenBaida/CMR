<h1>Configuration du projet Laravel CMR</h1>
<p>Ce document explique comment configurer un projet Laravel en utilisant les technologies suivantes : Laravel 9, Mailtrap et Laravel Form.</p>
<h2>Pr&eacute;requis</h2>
<p>Avant de commencer, assurez-vous d'avoir install&eacute; les &eacute;l&eacute;ments suivants :</p>
<ul>
<li>PHP version 7.4 ou sup&eacute;rieure</li>
<li>Composer</li>
<li>Un serveur de base de donn&eacute;es (MySQL, PostgreSQL, SQLite, etc.)</li>
<li>Un &eacute;diteur de texte ou un environnement de d&eacute;veloppement int&eacute;gr&eacute; (IDE)</li>
</ul>
<h2>Installation</h2>
<p>Suivez les &eacute;tapes ci-dessous pour installer le projet Laravel :</p>
<ol>
<li>Clonez le d&eacute;p&ocirc;t du projet dans votre r&eacute;pertoire local : <a href="https://github.com/HossamIbenBaida/CMR">https://github.com/HossamIbenBaida/CMR</a></li>
<li>Acc&eacute;dez au r&eacute;pertoire du projet : cd CMR</li>
<li>Installez les d&eacute;pendances du projet : composer install</li>
<li>Copiez le fichier .env.example et renommez-le en .env :</li>
<li>Configurer les informations de la base de donn&eacute;es dans le fichier .env :DB_CONNECTION=mysql<br />DB_HOST=127.0.0.1<br />DB_PORT=3306<br />DB_DATABASE=nom_de_la_base_de_donn&eacute;es<br />DB_USERNAME=nom_d'utilisateur<br />DB_PASSWORD=mot_de_passe</li>
<li>Effectuez les migrations de base de donn&eacute;es pour cr&eacute;er les tables n&eacute;cessaires :php artisan migrate</li>
<li>Effectuez les seeds pour cr&eacute;er l'utilisateur administrateur par d&eacute;faut : php artisan db:seed</li>
</ol>
<h2>Configuration de Mailtrap</h2>
<p>Mailtrap est un outil de test d'e-mail qui permet de visualiser les e-mails envoy&eacute;s &agrave; partir de votre application Laravel sans les envoyer r&eacute;ellement &agrave; vos utilisateurs. Voici comment configurer Mailtrap pour votre projet :</p>
<ol>
<li>Cr&eacute;ez un compte sur <a href="https://mailtrap.io/" target="_new">Mailtrap.io</a> si vous n'en avez pas d&eacute;j&agrave; un.</li>
<li>Dans votre fichier .env, ajoutez les informations suivantes pour configurer Mailtrap :MAIL_DRIVER=smtp<br />MAIL_HOST=smtp.mailtrap.io<br />MAIL_PORT=2525<br />MAIL_USERNAME=&lt;votre-nom-d-utilisateur-mailtrap&gt;<br />MAIL_PASSWORD=&lt;votre-mot-de-passe-mailtrap&gt;<br />MAIL_ENCRYPTION=null<br />MAIL_FROM_ADDRESS=&lt;adresse-e-mail-exp&eacute;diteur&gt;<br />MAIL_FROM_NAME=&lt;nom-exp&eacute;diteur&gt;</li>
<li>Assurez-vous de remplacer <code>&lt;votre-nom-d-utilisateur-mailtrap&gt;</code> et <code>&lt;votre-mot-de-passe-mailtrap&gt;</code> par les informations de votre compte Mailtrap.</li>
</ol>
<h2>Configuration de Laravel Form</h2>
<p>Laravel Form est une biblioth&egrave;que qui permet de cr&eacute;er facilement des formulaires HTML dans votre application Laravel. Voici comment installer Laravel Form :</p>
<ol>
<li>Installez Laravel Form en utilisant Composer :composer require laravelcollective/html</li>
<li>Dans le fichier <code>config/app.php</code>, ajoutez le fournisseur de services et la classe de facade suivants :
<p>'providers' =&gt; [<br /> // ...<br /> Collective\Html\HtmlServiceProvider::class,<br /> // ...<br />],</p>
</li>
<li>
<p>&nbsp;</p>
<p>Ajouter &eacute;galement la ligne suivante &agrave; la liste des alias de fa&ccedil;ade dans le m&ecirc;me fichier <code>config/app.php</code>&nbsp; 'aliases' =&gt; [<br /> // ...<br /> 'Form' =&gt; Collective\Html\FormFacade::class,<br /> 'Html' =&gt; Collective\Html\HtmlFacade::class,<br /> // ...<br />],<br /><br /></p>
</li>
</ol>
<p>&nbsp;</p>
<h2>Cr&eacute;ation d'un administrateur par d&eacute;faut</h2>
<ol>
<li>Ex&eacute;cuter la commande <code>php artisan migrate --seed</code> pour ex&eacute;cuter les migrations et alimenter la base de donn&eacute;es avec des donn&eacute;es de test.</li>
<li>Ouvrir le fichier <code>database/seeders/AdminSeeder.php</code> et modifier les valeurs de l'administrateur par d&eacute;faut, telles que l'email et le mot de passe.</li>
<li>Ex&eacute;cuter &agrave; nouveau la commande <code>php artisan migrate --seed</code> pour mettre &agrave; jour la base de donn&eacute;es avec les nouvelles informations de l'administrateur par d&eacute;faut.</li>
</ol>
<p>&nbsp;</p>
<h2>Utilisation</h2>
<p>Le projet Laravel est maintenant configur&eacute; avec succ&egrave;s. Vous pouvez ex&eacute;cuter le serveur de d&eacute;veloppement Laravel en ex&eacute;cutant la commande <code>php artisan serve</code> et acc&eacute;der &agrave; votre application Laravel &agrave; l'adresse <code>http://localhost:8000</code>.</p>
<h2>Informations de connexion &agrave; l'interface d'administration</h2>
<p>Apr&egrave;s la cr&eacute;ation de l'administrateur par d&eacute;faut, vous pouvez acc&eacute;der &agrave; l'interface d'administration en suivant les &eacute;tapes suivantes :</p>
<ol>
<li>Ouvrir un navigateur web et acc&eacute;der &agrave; l'adresse <code>http://127.0.0.1:8000/admin_login</code>.</li>
<li>Entrer l'adresse e-mail et le mot de passe de l'administrateur par d&eacute;faut dans les champs correspondants.</li>
<li>Cliquer sur le bouton "Se connecter" pour acc&eacute;der &agrave; l'interface d'administration.</li>
</ol>
<p>Les informations de connexion par d&eacute;faut sont les suivantes :</p>
<ul>
<li>Email : <a href="mailto:admin@email.com" target="_new">admin@email.com</a></li>
<li>Mot de passe : password</li>
</ul>
<p>Notez que pour des raisons de s&eacute;curit&eacute;, il est recommand&eacute; de modifier le mot de passe de l'administrateur par d&eacute;faut d&egrave;s que possible. Vous pouvez le faire en acc&eacute;dant &agrave; l'interface d'administration et en modifiant les informations de l'utilisateur.</p>
<p>Si vous avez des questions ou des probl&egrave;mes, n'h&eacute;sitez pas &agrave; me contacter</p>
<h1>Sch&eacute;ma de la base de donn&eacute;es</h1>
<p>Le sch&eacute;ma de la base de donn&eacute;es pour cette application est con&ccedil;u pour g&eacute;rer les informations relatives aux employ&eacute;s et aux entreprises. Il comprend les tables suivantes :</p>
<ul>
<li><strong>admins</strong> : contient les informations sur les administrateurs du syst&egrave;me, y compris leur nom, adresse e-mail et mot de passe.</li>
<li><strong>entreprises</strong> : contient les informations sur les entreprises, y compris leur nom, description et ID d'administrateur associ&eacute;.</li>
<li><strong>employees</strong> : contient les informations sur les employ&eacute;s, y compris leur nom, adresse e-mail, mot de passe, date de naissance, num&eacute;ro de t&eacute;l&eacute;phone, adresse et ID d'entreprise associ&eacute;.</li>
<li><strong>histories</strong> : contient l'historique des employ&eacute;s, y compris la description de chaque &eacute;v&eacute;nement et l'adresse e-mail de l'employ&eacute; associ&eacute;.</li>
<li><strong>invites</strong> : contient les informations sur les invitations envoy&eacute;es aux employ&eacute;s pour rejoindre une entreprise, y compris le nom de l'invit&eacute;, son adresse e-mail, l'ID d'entreprise associ&eacute; et un jeton unique.</li>
</ul>
<p>Les cl&eacute;s &eacute;trang&egrave;res suivantes sont utilis&eacute;es pour connecter les diff&eacute;rentes tables :</p>
<ul>
<li><strong>entreprises.admin_id</strong> : relie chaque entreprise &agrave; son administrateur correspondant dans la table des administrateurs.</li>
<li><strong>employees.admin_id</strong> : relie chaque employ&eacute; &agrave; son administrateur correspondant dans la table des administrateurs.</li>
<li><strong>employees.entreprise_id</strong> : relie chaque employ&eacute; &agrave; son entreprise correspondante dans la table des entreprises.</li>
<li><strong>histories.admin_id</strong> : relie chaque entr&eacute;e d'historique &agrave; son administrateur correspondant dans la table des administrateurs.</li>
<li><strong>histories.employee_email</strong> : relie chaque entr&eacute;e d'historique &agrave; l'employ&eacute; correspondant par son adresse e-mail dans la table des employ&eacute;s.</li>
<li><strong>invites.admin_id</strong> : relie chaque invitation &agrave; son administrateur correspondant dans la table des administrateurs.</li>
<li><strong>invites.entreprise_id</strong> : relie chaque invitation &agrave; son entreprise correspondante dans la table des entreprises.</li>
</ul>
<p>Ce sch&eacute;ma de base de donn&eacute;es peut &ecirc;tre utilis&eacute; comme base pour une application de gestion d'entreprise ou de ressources humaines, permettant de stocker et de g&eacute;rer facilement les informations relatives aux employ&eacute;s et aux entreprises.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>