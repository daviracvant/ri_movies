Now Playing :
<?= $name ?>
<br/>
<object type="application/x-shockwave-flash" data="<?=$player?>" width="200" height="20">
    <param name="movie" value="<?=$player?>"/>
    <param name="bgcolor" value="#ffffff"/>
    <param name="FlashVars" value="mp3=<?=$file?>&amp;autoplay=1""/>
</object>
