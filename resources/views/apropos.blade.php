@extends('layouts.app')


@section('content')


<h1>À propos de l'application</h1>

<h2>Développeur</h2>
<p>Huriel Georges Pierre</p>

<h2>Informations sur le cours</h2>
<ul>
  <li>420-5H6 MO Applications Web transactionnelles</li>
  <li>Automne 2023, Collège Montmorency</li>
</ul>

<h2>Étapes typiques d'utilisation pour vérifier le bon fonctionnement</h2>
<ol>
  <li>Accédez à la page d’accueil et utilisez le menu pour naviguer vers les sections <strong>Notes</strong> et <strong>Catégories</strong>.</li>
  <li>Créez une nouvelle note ou catégorie en cliquant sur <strong>“Ajouter”</strong>. Remplissez les champs requis et soumettez le formulaire.</li>
  <li>Modifiez une note ou une catégorie existante en cliquant sur <strong>“Modifier”</strong>. Vérifiez que les changements sont bien enregistrés.</li>
  <li>Supprimez une note ou une catégorie pour tester la suppression et la mise à jour de la liste.</li>
  <li>Utilisez le système d’authentification pour vous connecter ou vous inscrire. Vérifiez que les pages protégées sont accessibles uniquement après connexion.</li>
  <li>Testez le changement de langue (français/anglais) via le sélecteur de langue. Vérifiez que l’interface s’adapte dynamiquement.</li>
</ol>
<p>Résultat attendu : chaque action doit afficher un message de confirmation ou mettre à jour l’interface. Si une fonctionnalité ne fonctionne pas complètement, elle est annotée dans le code ou dans les commentaires de la page.</p>

<h2>Diagramme de la base de données</h2>
<img src="{{ asset('images/database-diagram.png') }}" alt="Diagramme de la base de données" style="max-width: 100%; height: auto;">

<p>Le diagramme représente les tables <strong>users</strong>, <strong>notes</strong>, et <strong>categories</strong> avec leurs relations :</p>
<ul>
  <li><strong>users</strong>: id, name, email, password</li>
  <li><strong>categories</strong>: id, name, created_at, updated_at</li>
  <li><strong>notes</strong>: id, title, content, category_id (clé étrangère), user_id (clé étrangère), created_at, updated_at</li>
</ul>
<p>Relations : un utilisateur peut avoir plusieurs notes, une note appartient à une catégorie.</p>

<h2>Sources d'inspiration</h2>
<ul>
  <li><a href="https://laravel.com">Laravel Documentation</a></li>
  <li><a href="https://getbootstrap.com">Bootstrap pour le design</a></li>
  <li><a href="https://github.com/laravel/ui">Laravel UI pour l’authentification</a></li>
</ul>
</div> 
@endsection 