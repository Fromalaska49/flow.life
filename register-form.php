			<form action="script-register.php" method="post" name="signup" onsubmit="return send()">
			<br />
					<div style="width:380px;height:400px;background-color:;/*position:absolute;top:0px;left:100px;*/" id="form">
						<br />
						<br />
						<br />
						<br />
						<p>
						<?php
						$number=rand(1,23);
						if($number>6){
							if($number>10){}
							else if($number==10){
							echo('"God causes the sun to rise on the evil and the good, and he sends rain on the just and the unjust."');
							}
							else if($number==7){
							echo('"For I will pour water on the thirsty land, and streams on the dry ground."');
							}
							else if($number==8){
							echo('"Swarms of living creatures will live wherever the river flows."');
							}
							else{
							echo('"The mouth of the righteous is a fountain of life."');
							}
						}
						else{
							if($number<4){
							echo('"Above all else, guard your heart, for from it flow the springs of life."');
							}
							else if($number==6){
							echo('"The intentions of a person\'s heart are deep waters, but a discerning person reveals them."');
							}
							else if($number==5){
							echo('"The words of the mouth are deep waters, but the fountain of wisdom is a rushing stream."');
							}
							else{
							echo('"The instruction of the wise is like a life-giving fountain; those who accept it avoid the snares of death."');
							}
						}
						?>
						</p>
						<h1>
							Sign Up
						</h1>
						<div class="inputcontainer">
							<input type="text" name="fname" class="registertextinput" style="width:175px;display:inline;" placeholder="First Name" />
							<input type="text" name="lname" class="registertextinput" style="width:180px;display:inline;" placeholder="Last Name" />
						</div>
						<div class="inputcontainer">
							<input type="text" name="email" id="email1" class="registertextinput" placeholder="Your Email" />
						</div>
						<div class="inputcontainer">
							<input type="text" name="emailcheck" id="email2" class="registertextinput" placeholder="Double Check Email" />
							<div style="position:relative;left:0px;display:inline;margin:0px;padding:0px;" id="email2indicator"></div>
						</div>
						<div class="inputcontainer">
							<input type="password" name="password" class="registertextinput" placeholder="Password" />
						</div>
						<div class="inputcontainer">
							<p style="margin:0px;height:30px;font-size:20px;padding:5px;position:relative;top:-2px;">Birthdate</p>
								<select name="m" class="registertextinput" style="width:175px;font-size:20px;height:40px;">
									<option value="">
										Month
									</option>
									<option value="1">
										January
									</option>
									<option value="2">
										February
									</option>
									<option value="3">
										March
									</option>
									<option value="4">
										April
									</option>
									<option value="5">
										May
									</option>
									<option value="6">
										June
									</option>
									<option value="7">
										July
									</option>
									<option value="8">
										August
									</option>
									<option value="9">
										September
									</option>
									<option value="10">
										October
									</option>
									<option value="11">
										November
									</option>
									<option value="12">
										December
									</option>
								</select>
								<select name="d" class="registertextinput" style="width:75px;font-size:20px;height:40px;">
									<option value="">
										Day
									</option>
									<option value="1">
										1
									</option>
									<option value="2">
										2
									</option>
									<option value="3">
										3
									</option>
									<option value="4">
										4
									</option>
									<option value="5">
										5
									</option>
									<option value="6">
										6
									</option>
									<option value="7">
										7
									</option>
									<option value="8">
										8
									</option>
									<option value="9">
										9
									</option>
									<option value="10">
										10
									</option>
									<option value="11">
										11
									</option>
									<option value="12">
										12
									</option>
									<option value="13">
										13
									</option>
									<option value="14">
										14
									</option>
									<option value="15">
										15
									</option>
									<option value="16">
										16
									</option>
									<option value="17">
										17
									</option>
									<option value="18">
										18
									</option>
									<option value="19">
										19
									</option>
									<option value="20">
										20
									</option>
									<option value="21">
										21
									</option>
									<option value="22">
										22
									</option>
									<option value="23">
										23
									</option>
									<option value="24">
										24
									</option>
									<option value="25">
										25
									</option>
									<option value="26">
										26
									</option>
									<option value="27">
										27
									</option>
									<option value="28">
										28
									</option>
									<option value="29">
										29
									</option>
									<option value="30">
										30
									</option>
									<option value="31">
										31
									</option>
								</select>
								<select name="y" id="byear" class="registertextinput" style="width:100px;font-size:20px;height:40px;" onchange="">
									<option value="">
										Year
									</option>
									<option value="2014">
										2014
									</option>
									<option value="2013">
										2013
									</option>
									<option value="2012">
										2012
									</option>
									<option value="2011">
										2011
									</option>
									<option value="2010">
										2010
									</option>
									<option value="2009">
										2009
									</option>
									<option value="2008">
										2008
									</option>
									<option value="2007">
										2007
									</option>
									<option value="2006">
										2006
									</option>
									<option value="2005">
										2005
									</option>
									<option value="2004">
										2004
									</option>
									<option value="2003">
										2003
									</option>
									<option value="2002">
										2002
									</option>
									<option value="2001">
										2001
									</option>
									<option value="2000">
										2000
									</option>
									<option value="1999">
										1999
									</option>
									<option value="1998">
										1998
									</option>
									<option value="1997">
										1997
									</option>
									<option value="1996">
										1996
									</option>
									<option value="1995">
										1995
									</option>
									<option value="1994">
										1994
									</option>
									<option value="1993">
										1993
									</option>
									<option value="1992">
										1992
									</option>
									<option value="1991">
										1991
									</option>
									<option value="1990">
										1990
									</option>
									<option value="1989">
										1989
									</option>
									<option value="1988">
										1988
									</option>
									<option value="1987">
										1987
									</option>
									<option value="1986">
										1986
									</option>
									<option value="1985">
										1985
									</option>
									<option value="1984">
										1984
									</option>
									<option value="1983">
										1983
									</option>
									<option value="1982">
										1982
									</option>
									<option value="1981">
										1981
									</option>
									<option value="1980">
										1980
									</option>
									<option value="1979">
										1979
									</option>
									<option value="1978">
										1978
									</option>
									<option value="1977">
										1977
									</option>
									<option value="1976">
										1976
									</option>
									<option value="1975">
										1975
									</option>
									<option value="1974">
										1974
									</option>
									<option value="1973">
										1973
									</option>
									<option value="1972">
										1972
									</option>
									<option value="1971">
										1971
									</option>
									<option value="1970">
										1970
									</option>
									<option value="1969">
										1969
									</option>
									<option value="1968">
										1968
									</option>
									<option value="1967">
										1967
									</option>
									<option value="1966">
										1966
									</option>
									<option value="1965">
										1965
									</option>
									<option value="1964">
										1964
									</option>
									<option value="1963">
										1963
									</option>
									<option value="1962">
										1962
									</option>
									<option value="1961">
										1961
									</option>
									<option value="1960">
										1960
									</option>
									<option value="1959">
										1959
									</option>
									<option value="1958">
										1958
									</option>
									<option value="1957">
										1957
									</option>
									<option value="1956">
										1956
									</option>
									<option value="1955">
										1955
									</option>
									<option value="1954">
										1954
									</option>
									<option value="1953">
										1953
									</option>
									<option value="1952">
										1952
									</option>
									<option value="1951">
										1951
									</option>
									<option value="1950">
										1950
									</option>
									<option value="1949">
										1949
									</option>
									<option value="1948">
										1948
									</option>
									<option value="1947">
										1947
									</option>
									<option value="1946">
										1946
									</option>
									<option value="1945">
										1945
									</option>
									<option value="1944">
										1944
									</option>
									<option value="1943">
										1943
									</option>
									<option value="1942">
										1942
									</option>
									<option value="1941">
										1941
									</option>
									<option value="1940">
										1940
									</option>
									<option value="1939">
										1939
									</option>
									<option value="1938">
										1938
									</option>
									<option value="1937">
										1937
									</option>
									<option value="1936">
										1936
									</option>
									<option value="1935">
										1935
									</option>
									<option value="1934">
										1934
									</option>
									<option value="1933">
										1933
									</option>
									<option value="1932">
										1932
									</option>
									<option value="1931">
										1931
									</option>
									<option value="1930">
										1930
									</option>
									<option value="1929">
										1929
									</option>
									<option value="1928">
										1928
									</option>
									<option value="1927">
										1927
									</option>
									<option value="1926">
										1926
									</option>
									<option value="1925">
										1925
									</option>
									<option value="1924">
										1924
									</option>
									<option value="1923">
										1923
									</option>
									<option value="1922">
										1922
									</option>
									<option value="1921">
										1921
									</option>
									<option value="1920">
										1920
									</option>
									<option value="1919">
										1919
									</option>
									<option value="1918">
										1918
									</option>
									<option value="1917">
										1917
									</option>
									<option value="1916">
										1916
									</option>
									<option value="1915">
										1915
									</option>
									<option value="1914">
										1914
									</option>
									<option value="1913">
										1913
									</option>
									<option value="1912">
										1912
									</option>
									<option value="1911">
										1911
									</option>
									<option value="1910">
										1910
									</option>
									<option value="1909">
										1909
									</option>
									<option value="1908">
										1908
									</option>
									<option value="1907">
										1907
									</option>
									<option value="1906">
										1906
									</option>
									<option value="1905">
										1905
									</option>
									<option value="1904">
										1904
									</option>
									<option value="1903">
										1903
									</option>
									<option value="1902">
										1902
									</option>
									<option value="1901">
										1901
									</option>
									<option value="1900">
										1900
									</option>
								</select>
						</div>
						<div class="inputcontainer">
							<div style="height:40px;width:360px;padding:10px;font-size:20px;">
									<input type="radio" name="sex" value="M" style="margin:0px;padding:0px;" /><p style="display:inline;position:relative;top:2px;margin-left:5px;margin-right:10px;">Male</p>
									<input type="radio" name="sex" value="F" style="margin:0px;padding:0px;" /><p style="display:inline;position:relative;top:2px;margin-left:5px;margin-right:10px;">Female</p>
									<input type="button" value="Register" onclick="send();" style="float:right;height:30px;font-size:20px;padding:5px;position:relative;right:10px;border-radius:100px;border-style:none;padding:2px 6px;text-shadow:0px 1px #CCCCCC;
									/* gradients */
									background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
									background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
									" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
									onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
							</div>
						</div>
						<input type="hidden" name="time" id="time" />
						<div style="position:relative;left:0px;margin-bottom:10px;padding:0px;background-color:#db8;padding:8px;border-radius:5px;color:black;border-style:solid;border-color:#a85;border-width:1px;display:none;" id="errorbox">error box</div>
						<p>
						<a href="pageadmin/" style="color:white;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Register or Log in to Page</a>
						</p>
					</div>
				
			</form>