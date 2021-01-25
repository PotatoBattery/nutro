<div class="timer-values hidden">
        <div class="timer-value-empty"></div>
    <?
        for($i = 0; $i < 60; $i++){
            if(($i+1) == 10){
                $class = 'timer-value-selected';
            }else{
                $class = '';
            }
    ?>
            <div class="timer-value <?= $class ?>"><?= ($i+1) < 10 ? '0'.($i+1).':00' : ($i+1).':00' ?></div>
    <?
        }
    ?>
        <div class="timer-value-empty"></div>
</div>
