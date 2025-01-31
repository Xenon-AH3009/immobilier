<div>
    <form action="<?= $base_url ?>/traitementLogin" method="post">
        <label for="log">Numero telephone</label>
        <input type="number" name="log" required>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" required>
        <input type="hidden" name="column" value="numero_telephone">
        <button type="submit">Login</button>
    </form>
    <a href="<?= $base_url ?>/signup">Je n'ai pas de compte</a>
</div>