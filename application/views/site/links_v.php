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
                        Poniżej przedstawiamy orientacyjne ceny (<strong>minus <a href="<?php print base_url('start'); ?>#promo">aktualna promocja</a></strong>) przyciemniania szyb w zależności od typu pojazdu. 
                        Ceny dotyczą tylnej szyby oraz tylnych bocznych (wszystko co za kierowcą). 
                        Ostateczna cena i ewentualny dodatkowy zakres prac zależy od indywidualnych ustaleń z Klientem.
                    </caption>
                    <thead>
                        <tr>
                            <th class="text-center"><h4>Typ samochodu</h4></th>
                            <th class="text-center"><h4>Orientacyjna cena</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Hatchback (3 drzwi)</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Smart | Fiat Seicento | Opel Corsa, Astra | VW Golf | Audi A3 | Seat Ibiza</span></td>
                            <td>od 250 zł</td>
                        </tr>
                        <tr>
                            <td><strong>Hatchback (5 drzwi)</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Opel Astra | VW Golf | Ford Fiesta, Focus</span></td>
                            <td>od 350 zł</td>
                        </tr>
                        <tr>
                            <td><strong>Coupe</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Peugeot 406 Coupe | Audi A5 | BMW 3, 6</span></td>
                            <td>od 300 zł</td>
                        </tr>
                        <tr>
                            <td><strong>Sedan</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Audi A4, A6, A8 | VW Passat | Opel Vectra, Insignia | Ford Mondeo</span></td>
                            <td>od 380 zł</td>
                        </tr>
                        <tr>
                            <td><strong>Liftback</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Skoda Octavia | Honda Accord | Opel Vectra, Insignia | Ford Mondeo</span></td>
                            <td>od 380 zł</td>
                        </tr>
                        <tr>
                            <td><strong>Kombi</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Skoda Octavia | VW Passat | Audi A4, A6</span></td>
                            <td>od 400 zł</td>
                        </tr>
                        <tr>
                            <td><strong>KombiVan</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Renault Kangoo | Skoda Roomster</span></td>
                            <td>od 350 zł</td>
                        </tr>
                        <tr>
                            <td><strong>SUV</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Mercedes ML | BMW X5, X6 | Infiniti QX70</span></td>
                            <td>od 400 zł</td>
                        </tr>
                        <tr>
                            <td><strong>Van</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Opel Zafira | Ford Galaxy</span></td>
                            <td>od 450 zł</td>
                        </tr>
                        <tr>
                            <td><strong>Mini bus</strong> <span class="text-muted visible-xs visible-sm visible-md visible-lg">np.: Mercedes Vito | VW Transporter | Opel Vivaro</span></td>
                            <td>od 450 zł</td>
                        </tr>
                    </tbody>
                </table>
				
            </div>

            <div class="clearfix"></div>
            <hr>
			<div class="text-center">
                        Zapraszamy Klientów zarówno z <strong>Zabrza</strong> (<a href="<?php print base_url('kontakt'); ?>#map">dojazd do naszego warsztatu</a>) jak i najbliższych okolic takich jak <strong>Gliwice, Bytom, Ruda Śląska, Tarnowskie Góry</strong>.
                    </div>
        </div>
    </div>
        
        

    </div>
    <!-- /.container -->