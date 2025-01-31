<div>
    <form action="<?= $base_url ?>/traitementLogin" method="post">
        <label for="log">Mail</label>
        <input type="email" name="log" required>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" required>
        <input type="hidden" name="column" value="mail">
        <button type="submit">Login</button>
    </form>
    <a href="<?= $base_url ?>/signup">Je n'ai pas de compte</a>
</div>