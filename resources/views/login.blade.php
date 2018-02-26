<html>
<form action="/login" method="POST">
    {{ csrf_field() }}
    <label>Email</label>
    <input type="text" name="email">

    <label>Senha</label>
    <input type="password" name="senha">

    <input type="submit" value="Login">
</form>


</html>