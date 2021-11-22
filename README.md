Spustenie projektu : 

    git clone https://github.com/mkulas-netizen/pozicovna_knih.git
    cd pozicovna_knih
    cp .env.example .env    
    create database 
    in .env connect db 
    composer install
    npm install
    npm run dev 
    php artisan serve 

    Netreba spúšťať databazovú migráciu všetko je nachystané ..

Obsah projektu 
    
    migracie , factories , seeders 
    crud 
    artisan komandy spušťané z fronendu 
    vlastné requesty pre validáciu autora 
    validácia v controlery 
    databázové modely a vstahy medzi modelami 
    vlastný artibut pre autora
    observer akcia pre model book 
    vlastný config pre language a middleware
    multijazyčnosť 
    AppServiceProvider - nastavenia vlastných blade skratiek 
    Vlastné rout subory pre oddelenie to len tak . pre ukazku 
    exporty do xlsx + rss + xml niektore som dal stohovat ine zobrazit dalsi ulozit 
    Api pre book aj autora  
    
    
    
