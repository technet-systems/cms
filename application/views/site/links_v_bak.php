<div class="container">
        
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <?php foreach($content as $item) { ?>
                <?php if($item->c1_id == 9) { ?>
                
                <hr>
                <h2 class="intro-text text-center"><?php print $item->c1_header; ?></h2>
                <hr>
                <?php } ?>
                <?php } ?>
                
            </div>

            <div class="col-sm-12 text-center">
                <table class="table table-striped table-hover">
                    <caption class="text-center">
                        Poniżej przedstawiamy orientacyjne ceny przyciemniania szyb w zależności od typu pojazdu. 
                        Ceny dotyczą tylnej szyby oraz tylnych bocznych (wszystko co za kierowcą). 
                        Ostateczna cena i ewentualny dodatkowy zakres prac zależy od indywidualnych ustaleń z Klientem.
                    </caption>
                    <thead>
                        <tr>
                            <th class="text-center">Typ samochodu</th>
                            <th class="text-center">Orientacyjna cena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hatchback (3 drzwi) <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. Seicento, Corsa, Astra, Golf, A3, Lanos"></span></td>
                            <td>od 250 zł</td>
                        </tr>
                        <tr>
                            <td>Hatchback (5 drzwi) <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. Astra, Golf, Fiesta, Focus"></span></td>
                            <td>od 350 zł</td>
                        </tr>
                        <tr>
                            <td>Coupe <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. 406 Coupe, A5, BMW 3, 6"></span></td>
                            <td>od 300 zł</td>
                        </tr>
                        <tr>
                            <td>Sedan <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. A4, A6, A8, Passat, Vectra, Mondeo"></span></td>
                            <td>od 380 zł</td>
                        </tr>
                        <tr>
                            <td>Liftback <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. Octavia, Accord, Vectra, Mondeo"></span></td>
                            <td>od 380 zł</td>
                        </tr>
                        <tr>
                            <td>Kombi <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. Octavia, Passat, A4, A6"></span></td>
                            <td>od 400 zł</td>
                        </tr>
                        <tr>
                            <td>KombiVan <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. Kangoo, Roomster"></span></td>
                            <td>od 350 zł</td>
                        </tr>
                        <tr>
                            <td>SUV <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. ML, X5, X6"></span></td>
                            <td>od 400 zł</td>
                        </tr>
                        <tr>
                            <td>Van <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. Voyager, Galaxy"></span></td>
                            <td>od 450 zł</td>
                        </tr>
                        <tr>
                            <td>Mini bus <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="np. Vito, Transporter, Traffic, Vivaro"></span></td>
                            <td>od 450 zł</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>
            
            <div class="clearfix"></div>
            <hr>

        </div>
    </div>
        
        

    </div>
    <!-- /.container -->