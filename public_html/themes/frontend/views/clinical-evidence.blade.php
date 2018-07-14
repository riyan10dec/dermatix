<?php
Theme::breadcrumb()
        ->add('Home', URL::to('/'))
        ->add('Clinical Evidence', URL::to('clinical-evidence'));
?>
<div class="container">
    <div class="row">
      <a target="_blank" href="{{ URL::to('scarpersonality') }}">
        <img src="{{ assets_path('images/1.jpg') }}" alt="">
      </a>
    </div>
</div>    
<section id="proven">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Proven Efficacy </h1>
        </div>
    </header>

    <div class="container">
        <div class="content blog col-xs-12">
                <!-- <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-color">
                            <tr class="text-upper">
                                <th>STUDY</th>
                                <th>PATIENTS</th>
                                <th>INTERVENTIONS</th>
                                <th>SCAR EVALUATION</th>
                                <th>OUTCOME</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            <tr class="text-upper tr-divide">
                                <td colspan="5">controlled comparative studies</td>
                            </tr>
                            <tr>
                                <td>Chan et al. [2], prospective, randomized, double-masked, within-subject comparison study</td>
                                <td class="text-bold">50 Asian Patients who underwent median sternotomy</td>
                                <td>Twice-daily silicone gel on half of wound compared with placebogel on other half of wound from postoperative. Week 2 to Month 3</td>
                                <td>Vancouver Scar Scale scores of pigmentation, vascularity, pliability, height, pain and itchiness</td>
                                <td>Scars that developed during silicone gel treatment were significantly flatter, less red, and more pliable and associated with significantly less pain and itching than scars that developed during placebo treatment</td>
                            </tr>
                            <tr>
                                <td>Signorini and clementonil[3].propective, randomized, parallel-grup comparisonstudy</td>
                                <td class="text-bold">160 patients who underwent surgery</td>
                                <td>Tweic-daily silicion gel treatment comporedwith no treatment initiated from 10 days to 3 weeks after surgery for 4 mounths</td>
                                <td>SCAR QUALITY [normal mature. slightly,hypertrophic,hypertrophicor keloid scarbased or color,hardness,elevationand relationshipto wound margins]</td>
                                <td>scar quality was significantly better in the silicone gel group than in the on treatment group at the 6-mounth follow-up visit: the incidince of hypertrophic or keloid scarring was 7% in the silicone gel compared with 26% in the no treatment group</td>
                            </tr>
                            <tr>
                                <td>Chernoff et al.[4];prospective,within-subject comparison study</td>
                                <td class="text-bold">30 Patients with bilateral hypertrohic scars keliods, or scars still in an erythematous</td>
                                <td>Silicone gel, SGS,or a combination of treatments for one scar compared with no treatment for the bilateral scar for</td>
                                <td>Scar elevatiom and skin surface texture measured using optical profilomenty;erythema;pliability;severity of symptoms</td>
                                <td>Scars treated with silicone gel,SGS,or silicone gel/SGS were statistacally significantly less elevated.less red,and assocoated with fewer symptoms than untreated scars</td>
                            </tr>
                            <tr>
                                <td>Fonseca Capdevila et al. [5]: prospective, parallel-group comparison study</td>
                                <td class="text-bold">132 Patients who underwent removal of a benign skin esion</td>
                                <td>Silicone gel treatment initiaded within 1 month of sugery</td>
                                <td>Height: redness: pliability:itching: pain/tenderness</td>
                                <td>Silicone gel and SGS were both effect in improving scar redness, hardness, elevation, pain, and itching: there were no statistically significant differences between silicone and SGS on any efficacy parameter at the month 6 follow-up</td>
                            </tr>
                            <tr class="text-upper tr-divide">
                                <td colspan="5">large-scale observational study</td>
                            </tr>
                            <tr>
                                <td>Sepehrmanesh[6];prospective, open-label, non-controlled study</td>
                                <td class="text-bold">1522 patiens with scars</td>
                                <td>Silicone gel was applied on averange twice dailly for 2 to 6 months, maximum 10 months</td>
                                <td>Height; color; pliability; itching; pain/tenderness</td>
                                <td>Improvement in scar color, pliability, height, itching, and paint/tenderness after silicone gel treatment of approximately 70% to 84.2% of patiens</td>
                            </tr>
                            <tr class="text-upper tr-divide">
                                <td colspan="5">small case series</td>
                            </tr>
                            <tr>
                                <td>Murison and James[7]; prospective, noncontrolled study</td>
                                <td class="text-bold">6 patiens with excessive scars (most at least 2 years old)</td>
                                <td>Silicone gel used for 8 weeks</td>
                                <td>Adapted Vancouver Scar Scale scores of elevation, redness, hardness, itching, tenderness, and pain; collagen content and blood flow measured using intracutaneous spectrophometry</td>
                                <td>ALl scars showed improvement in redness,elevetion, hardness, ant itching, and pain was reduced in symptomatic scars</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <div class="table-img">
                    <img src="{{ uploads_path('table-clinical.png') }}" alt="">
                </div>
        </div><!-- .content -->
    </div>
</section>

<section id="luka">
    <header class="page-header">
        <div class="container">
            <h1 class="title">Before After</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @for ($i = 1; $i <= 6; $i++)
                <div class="col-sm-2 col-xs-6">
                    <div class="img-clinical">
                        <img src="{{ uploads_path('before-after/b'.$i.'.png') }}" class="img-circle imgPclinical" alt="">
                        <p class="mb-0 pBefAf">before</p>
                        <span class="dividePBA"></span>
                        <p class="mb-0 pBefAf">after</p>
                        <img src="{{ uploads_path('before-after/a'.$i.'.png') }}" class="img-circle imgPclinical" alt="">
                    </div>
                </div>
                @endfor
            </div>
            <div class="col-xs-12">
                <ul id="exc-derma_page-clinical" class="exc-derma text-justify">
                    <p>REFERENCES :</p>
                    <li>Mustoe TA et al. Plast Reconstr Surg 2002;110:560-571</li>
                    <li>Chan KY, et al. A randomized, placebo-controlled, double-blind, prospective clinical trial of silicone gel in prevention of hypertrophic scar development in median sternotomy wound. Plast Reconstr Surg 2005; 116:1013-1020</li>
                    <li>Signorini M, Clementoni M. Clinical evaluation of a new, self-drying, silicone gel in the prevention of hypertrophy in new scars: a preliminary report. Aesth Plast Surg 2007;31:183-187</li>
                    <li>Chernoff WG, et al. The efficacy of topical silicone gel elastomers in the treatment of hypertrophic scars, keloid scars and post-laser exfoliation. Aesth Plast Surg 2007;31:495-500</li>
                    <li>Fonseca Capdevila E, Lopez Bran E, Fernandez Vozmediano JM, de la Torre Fraga JC, Querol Nasarre I, Moreno Jimenez JC Prevention of postexcisional scar sequelae of benign cutaneous lesions. Piel, in press</li>
                    <li>Sepehrmanesh M (2006) Observational study of 1,522 patients using Dermatix gel. Kompendium Dermatologie 1:30-32</li>
                    <li>Murison M, James W (2006) Preliminary evaluation of the efficacy of Dematix silicone gel in the reduction of scar elevation and pigmentation, J Plast Reconstr Aesthet Surg 59:437-439</li>
                </ul>
            </div>
        </div>
    </div>
</section>