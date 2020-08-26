<!DOCTYPE html>
<html lang="en">

<head>
    <title>coronavirus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/stylesheet.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/widget.css">
</head>

<body>
    <?php $this->load->view('include/widget'); ?>
    <section class="background-image">
        <div class="container-fluide">
            <div class="row edit-banned ">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="logo-banner edit-banned-new">
                        <img class=" image-responcive" src="<?php echo base_url() ?>assets/images/5ine-m2.png" alt="logo">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="logo-banner">
                        <img class=" image-responcive" src="<?php echo base_url() ?>assets/images/5ine-m3.png" alt="image">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                    <div class="logo-banner">
                        <spam class="logo-bjshj"><i class="fas fa-envelope icone-edit"></i> <a class="email" href="#">ncov2019@gov.in</a> </spam>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="logo-banner">

                        <div class="namtion">
                            <h3>National Help Line Number</h3>
                            <h5>+91-11-23978046</h5>

                            <h4>
                                <spam>Toll Free No:</spam> 1075
                            </h4>
                            <p>
                                <spam><i class="fab fa-whatsapp-square gw-icone"></i></spam>+91 901315151
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <scction class="back-ground">
        <div class="container-fluide ">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="table-cor back-ground">
                        <h5>NOVEL <span class="corona">CORONAVIRUS</span> CASES IN INDIA</h5>
                        <table>
                            <tr>
                                <th width="200px" >STATE</th>
                                <th width="100px" style="text-align: center;">REPORTED</th>
                                <th width="100px" style="text-align: center;">DEATHS</th>
                                <th width="100px" style="text-align: center;">RECOVERED</th>
                            </tr>
                        </table>
                            <div class="table-over-flow">
                                <?php if (!empty($result)) {
                                    foreach ($result as $key => $value) { ?>
                                    <table>
                                        <tr>
                                            <td width="200px"><?php echo !empty($value->name)?$value->name:''; ?></td>
                                            <td width="100px" style="text-align: center;"><?php echo !empty($value->reported)?$value->reported:'0'; ?></td>
                                            <td width="100px" style="text-align: center;"><?php echo !empty($value->deaths)?$value->deaths:'0'; ?></td>
                                            <td width="100px" style="text-align: center;"><?php echo !empty($value->recovered)?$value->recovered:'0'; ?></td>
                                            
                                        </tr>
                                    </table>
                                <?php } } ?>
                            </div>
                    </div>
                    <div class="condid-icone">
                        <a href="#"> <i class="fab fa-facebook-square gf-icaone"></i></a>
                        <a href=""><i class="fab fa-twitter-square gtw-icone"></i></a>
                        <a href=""><i class="fab fa-whatsapp-square gw-icone"></i></a>
                        <a href=""><i class="fab fa-telegram gtl-icone"></i></a>
                        <a href=""><i class="fab fa-linkedin gl-icone"></i></a>
                        <a href=""><i class="fab fa-pinterest-square gp-icone"></i></a>
                        <a href=""><i class="fas fa-envelope gem-icone"></i></a>
                    </div>

                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="covid-video">
                        <iframe width="600" height="350" src="https://www.youtube.com/embed/I-Yd-_XIWJg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </scction>
    <section>
        <div class="container-fluide ">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="covid-mainheading">
                        <h3>Article About Covid-19</h3>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="#https://www.mahonnathi.com/nation/aarogyasetu-the-new-app-to-assess-the-risk-of-covid-19" target="_blank">AarogyaSetu- The New App to assess the risk of COVID-19</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/featured/veerabhrahmendra-swami-predicted-coronavirus" target="_blank">Veerabhrahmendra Swami predicted Coronavirus</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/featured/prince-charles-tested-corona-positive" target="_blank">Prince Charles tested Corona Positive</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/nation/mahindra-company-developed-interim-life-saver-ventilator"  target="_blank">Mahindra Company Developed Interim Life Saver Ventilator</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/nation/parle-g-to-donate-3-crore-biscuit-packs-to-the-people-in-need" target="_blank">Parle- G to donate 3-crore Biscuit packs to the people in need</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/nation/online-transactions-to-be-free-of-cost-to-avoid-the-spread-of-coronavirus" target="_blank">Online transactions to be free of cost to avoid the spread of Coronavirus</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/nation/home-quarantined-stamped-people-to-be-jailed-if-found-at-public-places" target="_blank">Home-Quarantined stamped people to be jailed if found at Public Places</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/general-knowledge/singapore-to-go-under-one-month-shutdown" target="_blank">Singapore to go under One-Month Shutdown</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/science/government-to-launch-covid-path-tracker-app" target="_blank">Government to launch COVID path Tracker App</a>
                    </div>
                    <div class="covid-tablde-main">
                        <i class="fas fa-share-square gsq-icone"></i>
                        <a class="inner-cotent-covid" href="https://www.mahonnathi.com/health/medical-body-s-recommendation-for-faster-detection-of-covid-19-cases" target="_blank">Medical Body's Recommendation For Faster Detection of COVID-19 Cases </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluide ">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="conid-icone-who">
                        <i class="fab fa-twitter-square gtwer-icone"> 
                            <span class="india"> MoHFW_INDIA</span>
                             </i>
                        <i class="fab fa-youtube gtwer-icone"> 
                        <span class="india">
                            mohfwindia
                            </span>
                        </i>
                        <i class="fas fa-khanda  gtwer-icone"> 

                        <span class="india"> WHO</span>
                        </i>
                        <i class="fab fa-facebook gtwer-icone"> 

                        <span class="india"> MoHFWINDIA</span>
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section>
        <div class="container-fluide ">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="covid-footer-lag">
                        <h5> Oneindia in Other Languages </h5>
                        <ul>
                            <li> বাংলা</li>
                            <li> ગુજરાતી</li>
                            <li>हिन्दी</li>
                            <li> ಕನ್ನಡ</li>
                            <li> മലയാളം</li>
                            <li> தமிழ்</li>
                            <li> తెలుగు </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">

                </div>
            </div>
        </div>
    </section> -->


</body>

</html>