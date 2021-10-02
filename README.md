Aplikácia prenájom kníh

        Evidencia autorov a ich kníh 
        Evidencia prenajatých kníh
        Zobrazenie -> Autorov 
                        [ 
                            meno a priezvisko ,
                            počet celkových kníh 
                            počet prenajatých kníh
                        ];
                   -> Knihy 
                        [
                            Všetky knihy , 
                            Knihy daného autora,
                        ]

        Funkcie -> [
                        Migrácie => [ 
                                      cudzí kľúč , 
                                      cascade delete 
                                    ] 

                        Seeder , 

                        Vlastné atribúty v modeli ,

                        Automatická akcia pri inserte autora v modeli ,
                        Vlastná kontrola pre blade v AppServiceProvider [
                            kontroluje prenájom knihy ],

                        Button na automatický seed ( 
                            akcia artisan commandu z fronendu
                        ),

                        Kontrola existencie tabuliek (
                            Vhodné pre aplikácie kde je potrebný záznam 
                            z db už pri bootovaní aplikácie . 
                        ),
                        
                        CRUD akcie ,

                        Vlastný command,
                        
                        MultiLang
                        
                        Api verzia 1.0 ( v samostatnom controlleri ) 
                        Api verzia 2.0 ( v samostantom controlleri ) 
                        
                        Vlastný route file,
                        Controla existencie záznamov
                    ],

                             
        FronEnd ->  Štandard => [
                        Scss , Bootstrap4 
                        Paginácia v bootstrap štýle ( AppServiceProvider ) ,
                        Preposielanie dát pre include 
                    ]
                    
                    Vue => [
                            
                            ]
    
