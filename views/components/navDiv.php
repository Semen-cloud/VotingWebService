<div class = "navDiv">
    <a href="/"><img src="../../assets/img/logo.png" class="logo" alt="#"></a>
    <div style="display:flex;">
        <form action="/personalArea" method="GET"><input class = "navDivBtn" type="submit"<?php if(!$session->get('Auth')) echo "style = \"display: none;\"";?> value = "Личный кабинет"></form>
        <form action="/votings" method = "GET"><input class = "navDivBtn" type="submit" <?php if(!$session->get('Auth')) echo "style = \"display: none;\"";?> value = "Голосования"></form>
        <button class="navDivBtn showProducts" <?php if(!$session->get('Auth')) echo "style = \"display: none;\""?>>Товары</button>
        <form action="/exit" method = "POST"><input class="navDivBtn exit" type="submit" <?php if(!$session->get('Auth')) echo "style = \"display: none;\"";?>value = "Выйти"></form>
        <button class="navDivBtn auth" <?php if($session->get('Auth')) echo "style = \"display: none\";"?>>Войти</button>
        <button class="navDivBtn register"<?php if($session->get('Auth')) echo "style = \"display: none\";"?>>Зарегистрироваться</button>
    </div>
</div>

<div id = "modalWindowProducts" class = "modalWindow" >
        <div class="product">
            <img src="" alt="#">
            <p class = "descrOfProduct">bla bla bla</p>
            <form action="/addCreatorRights" method="POST">
                <input type="number" style="display:none" readonly value="1" name="creatorTime">
                <input type="submit" class = "addToBasket">Buy</input>
            </form>
        </div>
        <div class="product">
            <img src="" alt="#">
            <p class = "descrOfProduct">bla bla bla</p>
            <form action="/addCreatorRights" method="POST">
                <input type="number" style="display:none" readonly value="7" name="creatorTime">
                <input type="submit" class = "addToBasket">Buy</input>
            </form>
        </div>
        <div class="product">
            <img src="" alt="#">
            <p class = "descrOfProduct">bla bla bla</p>
            <form action="/addCreatorRights" method="POST">
                <input type="number" style="display:none" readonly value="30" name="creatorTime">
                <input type="submit" class = "addToBasket">Buy</input>
            </form>
        </div>
</div>