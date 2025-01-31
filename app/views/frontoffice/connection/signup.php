<div>
    <form action="<?= $base_url?>/traitementSignup" method="post">
        <label for="nom">Name</label>
        <input type="text" name="nom" required>
        <label for="mail">Mail</label>
        <input type="mail" name="mail" required>
        <label for="number">Numero telephone</label>
        <input type="number" name="tel" required>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" required>
        <button type="submit">Login</button>
    </form>
    <a href="<?= $base_url ?>/signup">J'ai un compte</a>
</div>