var handles = ["Select State","Andaman and Nicobar","Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chandigarh","Chhattisgarh","Dadra and Nagar Haveli and Daman and Diu","Delhi","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Ladakh","Lakshadweep","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Puducherry","Punjab", "Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal"];

$(function() {
  var options = '';
  for (var i = 0; i < handles.length; i++) {
      options += '<option value="' + handles[i] + '">' + handles[i] + '</option>';
  }
  $('#driver_state').html(options);
});
function select_district($val)
{
    if($val=='Select State') {
   var options = '';
  $('#driver_city').html(options);
  }
	if ($val=='Andaman and Nicobar') {
		var andamannicobar = ["Nicobar","North and Middle Andaman","South Andaman"];
		$(function() {
		var options = '';
		for (var i = 0; i < andamannicobar.length; i++) {
		options += '<option value="' + andamannicobar[i] + '">' + andamannicobar[i] + '</option>';
	}
	$('#driver_city').html(options);
  });
  }
 if($val=='Andhra Pradesh') {
   var andhra = ["Anantapur","Chittoor","East Godavari","Guntur","Kadapa","Krishna","Kurnool","Prakasam","SriPotti Sriramulu Nellore","Srikakulam","Vishakhapatnam","Vizianagaram","West Godavari"];
   $(function() {
  var options = '';
  for (var i = 0; i < andhra.length; i++) {
      options += '<option value="' + andhra[i] + '">' + andhra[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Arunachal Pradesh') {
    var ap = ["Anjaw","Changlang","East Kameng","East Siang","Kamle","Kra Daadi","Kurung Kumey","Lepa Rada","Lohit","Longding","Lower Dibang Valley","Lower Siang","Lower Subansiri","Namsai","Pakke-Kessang","Papum Pare","Shi Yomi","Siang","Tawang","Tirap","Upper Dibang Valley","Upper Siang","Upper Subansiri","West Kameng","West Siang"];
   $(function() {
  var options = '';
  for (var i = 0; i < ap.length; i++) {
      options += '<option value="' + ap[i] + '">' + ap[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Assam') {
    var assam = ["Baksa","Bajali","Barpeta","Bishwanath","Bongaigaon","Cachar","Charaideo","Chirang","Darrang","Dhemaji","Dima Hasao","Dhubri","Dibrugarh","Goalpara","Golaghat","Hailakandi","Hojai","Jorhat","Kamrup","Kamrup Metropolitan","Karbi Anglong","Karimganj","Kokrajhar","Lakhimpur","Majuli","Morigaon","Nagaon","Nalbari","Sivasagar","South Salmara","Sonitpur","Tinsukia","Udalguri","West Karbi Anglong"];
   $(function() {
  var options = '';
  for (var i = 0; i < assam.length; i++) {
      options += '<option value="' + assam[i] + '">' + assam[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Bihar') {
    var bihar = ["Araria","Arwal","Aurangabad","Banka","Begusarai","Bhagalpur","Bhojpur","Buxar","Darbhanga","East Champaran","Gaya","Gopalganj","Jamui","Jehanabad","Kaimur","Katihar","Khagaria","Kishanganj","Lakhisarai","Madhepura","Madhubani","Munger","Muzaffarpur","Nalanda","Nawada","Patna","Purnia","Rohtas","Saharsa","Samastipur","Saran","Sheikhpura","Sheohar","Sitamarhi","Siwan","Supaul","Vaishali","West Champaran"];
   $(function() {
  var options = '';
  for (var i = 0; i < bihar.length; i++) {
      options += '<option value="' + bihar[i] + '">' + bihar[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
    
	if ($val=='Chandigarh') {
		var chandigarh = ["Chandigarh"];
		$(function() {
		var options = '';
		for (var i = 0; i < chandigarh.length; i++) {
		options += '<option value="' + chandigarh[i] + '">' + chandigarh[i] + '</option>';
	}
	$('#driver_city').html(options);
  });
  }
  
  if ($val=='Chhattisgarh') {
    var Chhattisgarh = ["Balod","Baloda Bazar","Balrampur","Bastar","Bemetara","Bijapur","Bilaspur","Dantewada","Dhamtari","Durg","Gariaband","Gaurella-Pendra-Marwahi","Janjgir-Champa","Jashpur","Kabirdham (formerly Kawardha)","Kanker","Kondagaon","Korba","Koriya","Mahasamund","Mungeli","Narayanpur","Raigarh","Raipur","Rajnandgaon","Sukma","Surajpur","Surguja"];
   $(function() {
  var options = '';
  for (var i = 0; i < Chhattisgarh.length; i++) {
      options += '<option value="' + Chhattisgarh[i] + '">' + Chhattisgarh[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Dadra and Nagar Haveli and Daman and Diu') {
    var daman = ["Daman","Diu","Dadra and Nagar Haveli"];
   $(function() {
  var options = '';
  for (var i = 0; i < daman.length; i++) {
      options += '<option value="' + daman[i] + '">' + daman[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Delhi') {
    var delhi = ["Central Delhi","East Delhi","New Delhi","North Delhi","North East Delhi","North West Delhi","Shahdara","South Delhi","South East Delhi","South West Delhi","West Delhi"];
   $(function() {
  var options = '';
  for (var i = 0; i < delhi.length; i++) {
      options += '<option value="' + delhi[i] + '">' + delhi[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Goa') {
    var goa = ["North Goa","South Goa"];
   $(function() {
  var options = '';
  for (var i = 0; i < goa.length; i++) {
      options += '<option value="' + goa[i] + '">' + goa[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Gujarat') {
    var gujarat = ["Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Batod","Chhota Udepur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kheda","Kutch","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad"];
   $(function() {
  var options = '';
  for (var i = 0; i < gujarat.length; i++) {
      options += '<option value="' + gujarat[i] + '">' + gujarat[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Haryana') {
    var haryana = ["Ambala","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gurgaon","Hissar","Jhajjar","Jind","Kaithal","Karnal","Kurukshetra","Mahendragarh","Nuh","Palwal","Panchkula","Panipat","Rewari","Rohtak","Sirsa","Sonipat","Yamuna Nagar"];
   $(function() {
  var options = '';
  for (var i = 0; i < haryana.length; i++) {
      options += '<option value="' + haryana[i] + '">' + haryana[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  
  if ($val=='Himachal Pradesh') {
    var himachal = ["Bilaspur","Chamba","Hamirpur","Kangra (Dharamshala)","Kinnaur","Kullu","Lahaul and Spiti","Mandi","Shimla","Sirmaur","Solan","Una"];
   $(function() {
  var options = '';
  for (var i = 0; i < himachal.length; i++) {
      options += '<option value="' + himachal[i] + '">' + himachal[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Jammu and Kashmir') {
    var jammu = ["Anantnag","Budgam","Bandipora","Baramulla","Doda","Ganderbal","Jammu","Kathua","Kishtwar","Kulgam","Kupwara","Poonch","Pulwama","Rajouri","Ramban","Reasi","Samba","Shopian","Srinagar","Udhampur"];
   $(function() {
  var options = '';
  for (var i = 0; i < jammu.length; i++) {
      options += '<option value="' + jammu[i] + '">' + jammu[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Jharkhand') {
    var jharkhand = ["Bokaro","Chatra","Deoghar","Dhanbad","Dumka","East Singhbhum","Garhwa","Giridih","Godda","Gumla","Hazaribag","Jamtara","Khunti","Koderma","Latehar","Lohardaga","Pakur","Palamu","Ramgarh","Ranchi","Sahibganj","Seraikela Kharsawan","Simdega","West Singhbhum"];
   $(function() {
  var options = '';
  for (var i = 0; i < jharkhand.length; i++) {
      options += '<option value="' + jharkhand[i] + '">' + jharkhand[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Karnataka') {
    var karnataka = ["Bagalkot","Ballari","Belgaum","Bangalore Rural","Bangalore Urban","Bidar","Bijapur","Chamarajanagara","Chikkaballapura","Chikkamagaluru","Chitradurga","Dakshina Kannada (Mangalore)","Davanagere","Dharwad","Gadag","Gulbarga","Hassan","Haveri","Kodagu","Kolar","Koppal","Mandya","Mysore","Raichur","Ramanagara","Shimoga","Tumakuru","Udupi","Uttara Kannada","Vijayanagara","Yadgir"];
   $(function() {
  var options = '';
  for (var i = 0; i < karnataka.length; i++) {
      options += '<option value="' + karnataka[i] + '">' + karnataka[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Kerala') {
    var kerala = ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thrissur","Thiruvananthapuram","Wayanad"];
   $(function() {
  var options = '';
  for (var i = 0; i < kerala.length; i++) {
      options += '<option value="' + kerala[i] + '">' + kerala[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Ladakh') {
		var ladakh = ["Kargil", "Leh"];
		$(function() {
		var options = '';
		for (var i = 0; i < ladakh.length; i++) {
		options += '<option value="' + ladakh[i] + '">' + ladakh[i] + '</option>';
	}
	$('#driver_city').html(options);
  });
  }
  
  if ($val=='Lakshadweep') {
		var lakshadweep  = ["Lakshadweep"];
		$(function() {
		var options = '';
		for (var i = 0; i < lakshadweep.length; i++) {
		options += '<option value="' + lakshadweep[i] + '">' + lakshadweep[i] + '</option>';
	}
	$('#driver_city').html(options);
  });
  }
  
  if ($val=='Madhya Pradesh') {
    var mp = ["Agar Malwa","Alirajpur","Anuppur","Ashok Nagar","Balaghat","Barwani","Betul","Bhind","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dindori","Guna","Gwalior","Harda","Hoshangabad","Indore","Jabalpur","Jhabua","Katni","Khandwa","Khargone","Mandla","Mandsaur","Morena","Narsinghpur","Nagda","Neemuch","Niwari","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Satna","Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Sidhi","Singrauli","Tikamgarh","Ujjain","Umaria","Vidisha"];
   $(function() {
  var options = '';
  for (var i = 0; i < mp.length; i++) {
      options += '<option value="' + mp[i] + '">' + mp[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Maharashtra') {
    var maharashtra = ["Ahmednagar","Akola","Amaravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai City (ex Bombay)","Mumbai Suburban","Nanded","Nandurbar","Nagpur","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"];
   $(function() {
  var options = '';
  for (var i = 0; i < maharashtra.length; i++) {
      options += '<option value="' + maharashtra[i] + '">' + maharashtra[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
   if ($val=='Manipur') {
    var manipur = ["Bishnupur","Chandel","Churachandpur","Imphal East","Imphal West","Jiribam","Kakching","Kamjong","Kangpokpi","Noney","Pherzawl","Senapati","Tamenglong","Tengnoupal","Thoubal","Ukhrul"];
   $(function() {
  var options = '';
  for (var i = 0; i < manipur.length; i++) {
      options += '<option value="' + manipur[i] + '">' + manipur[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
   if ($val=='Meghalaya') {
    var meghalaya = ["East Garo Hills (Williamnagar)","East Khasi Hills (Shillong)","East Jaintia Hills (Khliehriat)","North Garo Hills (Resubelpara)","Ri Bhoi (Nongpoh)","South Garo Hills (Baghamara)","South West Garo Hills (Ampati)","South West Khasi Hills (Mawkyrwat)","West Jaintia Hills (Jowai)", "West Garo Hills (Tura)", "West Khasi Hills (Nongstoin)"];
   $(function() {
  var options = '';
  for (var i = 0; i < meghalaya.length; i++) {
      options += '<option value="' + meghalaya[i] + '">' + meghalaya[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
   if ($val=='Mizoram') {
    var mizoram = ["Aizawl","Champhai","Hnahthial","Khawzawl","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Saitual","Serchhip"];
   $(function() {
  var options = '';
  for (var i = 0; i < mizoram.length; i++) {
      options += '<option value="' + mizoram[i] + '">' + mizoram[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
   if ($val=='Nagaland') {
    var nagaland = ["Dimapur","Kiphire","Kohima","Longleng","Mokokchung","Mon","Noklak","Peren","Phek","Tuensang","Wokha","Zunheboto"];
   $(function() {
  var options = '';
  for (var i = 0; i < nagaland.length; i++) {
      options += '<option value="' + nagaland[i] + '">' + nagaland[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Orissa') {
    var orissa = ["Angul","Boudh (Bauda)","Bhadrak","Balangir","Bargarh (Baragarh)","Balasore","Cuttack","Debagarh (Deogarh)","Dhenkanal","Ganjam","Gajapati","Jharsuguda","Jajpur","Jagatsinghpur","Khordha","Kendujhar","Kalahandi","Kandhamal","Koraput","Kendrapara","Malkangiri","Mayurbhanj","Nabarangpur","Nuapada","Nayagarh","Puri","Rayagada","Sambalpur","Subarnapur (Sonepur)","Sundargarh"];
   $(function() {
  var options = '';
  for (var i = 0; i < orissa.length; i++) {
      options += '<option value="' + orissa[i] + '">' + orissa[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Puducherry') {
    var puducherry = ["Karaikal","Mahe","Pondicherry","Yanam"];
   $(function() {
  var options = '';
  for (var i = 0; i < puducherry.length; i++) {
      options += '<option value="' + puducherry[i] + '">' + puducherry[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Punjab') {
    var punjab = ["Amritsar","Barnala","Bathinda","Firozpur","Faridkot","Fatehgarh Sahib","Fazilka","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Mansa","Moga","Sri Muktsar Sahib","Pathankot","Patiala","Rupnagar","Sahibzada Ajit Singh Nagar (Mohali)","Sangrur","Shahid Bhagat Singh Nagar (Nawanshahr)","Tarn Taran"];
   $(function() {
  var options = '';
  for (var i = 0; i < punjab.length; i++) {
      options += '<option value="' + punjab[i] + '">' + napunjabgaland[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Rajasthan') {
    var rajasthan = ["Ajmer","Alwar","Bikaner","Barmer","Banswara","Bharatpur","Baran","Bundi","Bhilwara","Churu","Chittorgarh","Dausa","Dholpur","Dungarpur","Ganganagar","Hanumangarh","Jhunjhunu","Jalore","Jodhpur","Jaipur","Jaisalmer","Jhalawar","Karauli","Kota","Nagaur","Pali","Pratapgarh","Rajsamand","Sikar","Sawai Madhopur","Sirohi","Tonk","Udaipur"];
   $(function() {
  var options = '';
  for (var i = 0; i < rajasthan.length; i++) {
      options += '<option value="' + rajasthan[i] + '">' + rajasthan[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  if ($val=='Sikkim') {
    var sikkim = ["East Sikkim (Gangtok)","North Sikkim (Mangan)","South Sikkim (Namchi)","West Sikkim (Gyalshing)"];
   $(function() {
  var options = '';
  for (var i = 0; i < sikkim.length; i++) {
      options += '<option value="' + sikkim[i] + '">' + sikkim[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  
  if ($val=='Tamil Nadu') {
    var tn = ["Ariyalur","Chengalpattu","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kallakurichi","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Mayiladuthurai","Nagapattinam","Nilgiris","Namakkal","Perambalur","Pudukkottai","Ramanathapuram","Ranipet","Salem","Sivaganga","Tenkasi","Tiruppur","Tiruchirappalli","Theni","Tirunelveli","Thanjavur","Thoothukudi","Tirupattur","Tiruvallur","Tiruvarur","Tiruvannamalai","Vellore","Viluppuram","Virudhunagar"];
   $(function() {
  var options = '';
  for (var i = 0; i < tn.length; i++) {
      options += '<option value="' + tn[i] + '">' + tn[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  
  if ($val=='Telangana') {
    var telangana = ["Adilabad","Komaram Bheem","Bhadradri Kothagudem","Hyderabad","Jagtial","Jangaon","Jayashankar Bhupalpally","Jogulamba Gadwal","Kamareddy","Karimnagar","Khammam","Mahabubabad","Mahbubnagar","Mancherial","Medak","Medchal–Malkajgiri","Mulugu","Nalgonda","Narayanpet","	Nagarkurnool","Nirmal","Nizamabad","Peddapalli","Rajanna Sircilla","Ranga Reddy","Sangareddy","Siddipet","Suryapet","Vikarabad","Wanaparthy","	Warangal Urban","Warangal Rural","Yadadri Bhuvanagiri"];
   $(function() {
  var options = '';
  for (var i = 0; i < telangana.length; i++) {
      options += '<option value="' + telangana[i] + '">' + telangana[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  
  if ($val=='Tripura') {
    var tripura = ["Dhalai","Gomati","Khowai","North Tripura (Dharmanagar)","Sepahijala","South Tripura (Belonia)","Unokoti","West Tripura (Agartala)"];
   $(function() {
  var options = '';
  for (var i = 0; i < tripura.length; i++) {
      options += '<option value="' + tripura[i] + '">' + tripura[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  
  if ($val=='Uttar Pradesh') {
    var up = ["Agra","Aligarh","Allahabad","Ambedkar Nagar","Amethi","Amroha","Auraiya","Azamgarh","Bagpat","Bahraich",
	"Ballia","Balrampur","Banda","Barabanki","Bareilly","Basti","Bhadohi","Bijnor","Budaun","Bulandshahr",
	"Chandauli","Chitrakoot","Deoria","Etah","Etawah","Faizabad","Farrukhabad","Fatehpur","Firozabad","Gautam Buddh Nagar",
	"Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hapur","Hardoi","Hathras","Jalaun","	Jaunpur",
	"Jhansi","Kannauj","Kanpur Dehat","Kanpur Nagar","Kasganj","Kaushambi","Kushinagar","Lakhimpur Kheri","Lalitpur","Lucknow",
	"Maharajganj","Mahoba","Mainpuri","Mathura","Mau","Meerut","Mirzapur","Moradabad","Muzaffarnagar","Pilibhit",
	"Pratapgarh","Raebareli","Rampur","Saharanpur","Sambhal","Sant Kabir Nagar","Shahjahanpur","Shamli","Shravasti","Siddharthnagar",
	"Sitapur","Sonbhadra","Sultanpur","Unnao","Varanasi"];
   $(function() {
  var options = '';
  for (var i = 0; i < up.length; i++) {
      options += '<option value="' + up[i] + '">' + up[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  
  if ($val=='Uttarakhand') {
    var uttarakhand = ["Almora","Bageshwar","Chamoli","Champawat","Dehradun","Haridwar","Nainital","Pauri Garhwal","Pithoragarh","Rudraprayag","Tehri Garhwal","Udham Singh Nagar","Uttarkashi"];
   $(function() {
  var options = '';
  for (var i = 0; i < uttarakhand.length; i++) {
      options += '<option value="' + uttarakhand[i] + '">' + uttarakhand[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
  
  
  if ($val=='West Bengal') {
    var wb = ["Alipurduar","Bankura","Paschim Bardhaman","Purba Bardhaman","Birbhum","Cooch Behar","Dakshin Dinajpur","Darjeeling","Hooghly","Howrah","Jalpaiguri","Jhargram","Kalimpong","Kolkata","Maldah","Murshidabad","Nadia","North 24 Parganas","Paschim Medinipur","Purba Medinipur","Purulia","South 24 Parganas","Uttar Dinajpur"];
   $(function() {
  var options = '';
  for (var i = 0; i < wb.length; i++) {
      options += '<option value="' + wb[i] + '">' + wb[i] + '</option>';
  }
  $('#driver_city').html(options);
  });
  }
}