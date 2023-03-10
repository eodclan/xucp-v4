<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.3
// *
// * Copyright (c) 2023 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");
secure_url();

xucp_head_no_logged("book",IMPRINT_HEADER);
xucp_content_no_logged();

$select_stmt = $db->prepare("SELECT * FROM xucp_imprint WHERE id = 1");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    echo"
					<div class='container py-2'>
                        <div class='row'>
							<div class='col-12 flex-column d-none d-sm-flex'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title text-center'>".IMPRINT_HEADER."</h4>
									</div>
									<div class='card-body'>
											<tr>				  
												<td>
													<h6 class='title'>
														".IMPRINT_NAME."
													</h6>
													<div class='input-group'>
														".htmlentities($row['name'], ENT_QUOTES, 'UTF-8')."
													</div>	
												</td>
											</tr>
											<tr>					  
												<td>
													<h6 class='title'>
														".IMPRINT_ADDRESS."
													</h6>
													<div class='input-group'>
														".htmlentities($row['address'], ENT_QUOTES, 'UTF-8')."
													</div>	
												</td>						
											</tr>
											<tr>					  
												<td>
													<h6 class='title'>
														".IMPRINT_PHONE."
													</h6>
													<div class='input-group'>
														".format_comment($row['phone_number'])."
													</div>	
												</td>						
											</tr>
											<tr>					  
												<td>
													<div class='input-group'>
														<p><strong>Haftung f??r Inhalte</strong><br>
                                                        Die Inhalte unserer Seiten wurden mit gr????ter Sorgfalt erstellt. F??r die Richtigkeit, Vollst??ndigkeit und Aktualit??t der Inhalte k??nnen wir jedoch keine Gew??hr ??bernehmen. Als Diensteanbieter sind wir gem???? ?? 7 Abs.1 TMG f??r eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach ???? 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, ??bermittelte oder gespeicherte fremde Informationen zu ??berwachen oder nach Umst??nden zu forschen, die auf eine rechtswidrige T??tigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unber??hrt. Eine diesbez??gliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung m??glich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.<br><strong>Haftung f??r Links</strong><br>
                                                        Unser Angebot enth??lt Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb k??nnen wir f??r diese fremden Inhalte auch keine Gew??hr ??bernehmen. F??r die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf m??gliche Rechtsverst????e ??berpr??ft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.<br><strong>Urheberrecht</strong><br>
                                                        Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielf??ltigung, Bearbeitung, Verbreitung und jede Art der Verwertung au??erhalb der Grenzen des Urheberrechtes bed??rfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur f??r den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.<br><strong>Datenschutz</strong><br>
                                                        Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten m??glich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder eMail-Adressen) erhoben werden, erfolgt dies, soweit m??glich, stets auf freiwilliger Basis. Diese Daten werden ohne Ihre ausdr??ckliche Zustimmung nicht an Dritte weitergegeben. <br>
                                                        Wir weisen darauf hin, dass die Daten??bertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitsl??cken aufweisen kann. Ein l??ckenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht m??glich. <br>
                                                        Der Nutzung von im Rahmen der Impressumspflicht ver??ffentlichten Kontaktdaten durch Dritte zur ??bersendung von nicht ausdr??cklich angeforderter Werbung und Informationsmaterialien wird hiermit ausdr??cklich widersprochen. Die Betreiber der Seiten behalten sich ausdr??cklich rechtliche Schritte im Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-Mails, vor.<br>
                                                        </p>
													</div>	
												</td>						
											</tr>											
									</div>
								</div>
							</div>
						</div>
					</div>";
}

xucp_foot_no_logged();
