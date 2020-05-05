<!DOCTYPE html>
<html lang="en" class="wish-list">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agile Adoption</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header>
            <h1 class="logo"><a href="/Web_Dev/index.php">Agile Adoption</a></h1>
            <nav">
                <ul class="navList">
                    <li><a href="/Web_Dev/index.php">Home</a></li>
                    <li><a href="/Web_Dev/about.html">About</a></li>
                    <li><a href="/Web_Dev/contact_us.html">Contact Us</a></li>
                    <li><a href="/Web_Dev/wish_list.php">My Wish List</a></li>
                    <li><a href="/Web_Dev/find_pet.html">Find Pet</a></li>           
                </ul>
            </nav>
        </header>
        <main>
            <!--start section for pet display-->
            <section>
                <div id="myList" class="pet-display-header">
                    <h2 class="section__title">My Wish List</h2>
					<!--need add object here-->
                </div>
            </section>
                <section class="pets-wrapper">
                    <div id="dogs" class="pets">
                    </div>
					<br><br>
					<button class="find-wrapper" onclick="clearList()">Clear Wish List</button><br>
                    
                </section><!--end section for pet display-->
        </main>

        <footer>
            <nav">
                <ul class="navList">
                    <li><a href="/Web_Dev/index.php">Home</a></li>
                    <li><a href="/Web_Dev/about.html">About</a></li>
                    <li><a href="/Web_Dev/contact_us.html">Contact Us</a></li>
                    <li><a href="/Web_Dev/wish_list.php">My Wish List</a></li>
                    <li><a href="/Web_Dev/find_pet.html">Find Pet</a></li>                
                </ul>
            </nav>
            <h1 class="footer-logo"><a href="/Web_Dev/index.php">Agile <br>Adoption</a></h1>
        </footer>
		<div id="profiles">
		</div>
<?php $count = $_POST["count"];?>
<?php
	for ($i = 0; $i < $count; $i++){
		$demo = "pet" . $i;
		$list[] = $_POST[$demo];
	}
?>
<script>
//Borrowed code.
var list = <?php echo '["' . implode('", "', $list) . '"]' ?>;
var storedAddresses = JSON.parse(localStorage.getItem("wishes"));
if (storedAddresses == null){
	var list1 = [];
	for (l of list){
		if (l != ""){
			list1.push(l);
		}
	}
	localStorage.setItem("wishes","");
	localStorage.setItem("wishes",JSON.stringify(list1));
}
else{
	for (var m of list){
		if (!storedAddresses.includes(m) && m != ""){
			storedAddresses.push(m);
		}
	}
	localStorage.setItem("wishes","");
	localStorage.setItem("wishes",JSON.stringify(storedAddresses));
}
var count = 0;
var Dogs = document.getElementById("dogs");
var Profiles = document.getElementById("profiles");

if (storedAddresses != null){
	for (var element of storedAddresses){
		createPet(element,count);
	}
}
function createPet(element,count){
	var parts = element.split("/");
	var img = "../Web_Dev/pet_images/" + element;
	if (img.length > 22){
		var d = Dogs.appendChild(createNewPetElement(parts[0]));
		d.appendChild(createPetTitle(parts[0]));
		d.appendChild(createPetImage(img));
		d.appendChild(createPetInformation(parts[1],parts[2]));
		var p = Profiles.appendChild(createPetProfile(parts[0],parts[1],parts[2],img));
		d.appendChild(createPetButtons(p,element,count));
		count = count + 1;
	}
	return count;
}
function createPetProfile(name,gender,breed,img){
	var profile = document.createElement('div');
	profile.classList.add("modal");
	
	var profileFront = document.createElement('div');
	profileFront.classList.add("modal-front");
	profile.appendChild(profileFront);
	
	var profileHeader = document.createElement('div');
	profileHeader.classList.add("modal-header");
	profileFront.appendChild(profileHeader);
	
	var xbtn = document.createElement('span');
	xbtn.classList.add("close");
	xbtn.innerHTML = "x";
	xbtn.onclick = function(){profile.style.display = 'none';};
	profileHeader.appendChild(xbtn);
	
	var header = document.createElement('h2');
	header.textContent = name;
	profileHeader.appendChild(header);
	
	var modal_body = document.createElement('div');
	modal_body.classList.add("modal-body");
	profileFront.appendChild(modal_body);
		
	var modal_pad_left = document.createElement('div');
	modal_pad_left.classList.add("body-pad-left");
	modal_body.appendChild(modal_pad_left);
	
	var modal_body_left = document.createElement('div');
	modal_body_left.classList.add("modal-body-left");
	modal_body.appendChild(modal_body_left);
	
	var tac = document.createElement('div');
	tac.style.textAlign = 'center';
	modal_body_left.appendChild(tac);
	
	var pi = document.createElement('img');
	pi.classList.add("pet-img");
	pi.setAttribute("src",img);
	pi.setAttribute("alt","Pet Image");
	tac.appendChild(pi);
	
	var modal_body_right = document.createElement('div');
	modal_body_right.classList.add("modal-body-right");
	modal_body.appendChild(modal_body_right);
	
	var profile_info1 = document.createElement('div');
	profile_info1.classList.add("profile-info");
	modal_body_right.appendChild(profile_info1);
	
	var info_header1 = document.createElement('p');
	info_header1.classList.add("info-header");
	info_header1.textContent = "Pet Facts";
	profile_info1.appendChild(info_header1);
	
	var profile_selections1 = document.createElement('div');
	profile_selections1.classList.add("profile-sections");
	profile_info1.appendChild(profile_selections1);
	
	var fact_left1 = document.createElement('div');
	fact_left1.classList.add("fact-left");
	profile_selections1.appendChild(fact_left1);
	
	var info1 = document.createElement('p');
	info1.classList.add("info-h2");
	fact_left1.appendChild(info1);
	
	var name1 = document.createElement('b');
	name1.classList.add("info-h1");
	name1.innerHTML = "Name:";
	info1.appendChild(name1);
	info1.innerHTML += " " + name + "<br>";
					
	var breed1 = document.createElement('b');
	breed1.classList.add("info-h1");
	breed1.innerHTML = "Breed:";
	info1.appendChild(breed1);
	info1.innerHTML += " " + breed + "<br>";
								
	var color1 = document.createElement('b');
	color1.classList.add("info-h1");
	color1.innerHTML = "Color:";
	info1.appendChild(color1);
	info1.innerHTML += " " + "<br>";
								
	var age1 = document.createElement('b');
	age1.classList.add("info-h1");
	age1.innerHTML = "Age:";
	info1.appendChild(age1);
	info1.innerHTML += " " + "<br>";
								
	var size1 = document.createElement('b');
	size1.classList.add("info-h1");
	size1.innerHTML = "Size:";
	info1.appendChild(size1);
	info1.innerHTML += " " + "<br>";
	
	var fact_right1 = document.createElement('div');
	fact_right1.classList.add("fact-right");
	profile_selections1.appendChild(fact_right1);
	
	var info2 = document.createElement('p');
	info2.classList.add("info-h2");
	fact_right1.appendChild(info2);
	
	var gender1 = document.createElement('b');
	gender1.classList.add("info-h1");
	gender1.innerHTML = "Gender:";
	info2.appendChild(gender1);
	info2.innerHTML += " " + gender + "<br>";
	
	var pet_id1 = document.createElement('b');
	pet_id1.classList.add("info-h1");
	pet_id1.innerHTML = "Pet ID:";
	info2.appendChild(pet_id1);
	info2.innerHTML += " " + "<br>";
	
	var location1 = document.createElement('b');
	location1.classList.add("info-h1");
	location1.innerHTML = "Location:";
	info2.appendChild(location1);
	info2.innerHTML += " " + "<br>";
	
	var shelter1 = document.createElement('b');
	shelter1.classList.add("info-h1");
	shelter1.innerHTML = "Shelter:";
	info2.appendChild(shelter1);
	info2.innerHTML += " " + "<br>";
	
	var shelter_contact1 = document.createElement('b');
	shelter_contact1.classList.add("info-h1");
	shelter_contact1.innerHTML = "Shelter Contact:";
	info2.appendChild(shelter_contact1);
	info2.innerHTML += " " + "<br>";
	
	var profile_info2 = document.createElement('div');
	profile_info2.classList.add("profile-info");
	modal_body_right.appendChild(profile_info2);
	
	var info_header2 = document.createElement('p');
	info_header2.classList.add("info-header");
	info_header2.textContent = "Pet Info";
	profile_info2.appendChild(info_header2);
	
	var profile_selections2 = document.createElement('div');
	profile_selections2.classList.add("profile-sections");
	profile_info2.appendChild(profile_selections2);
	
	var info_left1 = document.createElement('div');
	info_left1.classList.add("info-left");
	profile_selections2.appendChild(info_left1);
	
	var u1 = document.createElement('ul');
	u1.classList.add("info-h2");
	u1.style.marginLeft = "50px";
	info_left1.appendChild(u1);
	
	var l1 = document.createElement('li');
	l1.innerHTML = "Neutered";
	u1.appendChild(l1);
	var l2 = document.createElement('li');
	l2.innerHTML = "Vaccinated";
	u1.appendChild(l2);
	var l3 = document.createElement('li');
	l3.innerHTML = "Good with kids";
	u1.appendChild(l3);
	var l4 = document.createElement('li');
	l4.innerHTML = "House trained";
	u1.appendChild(l4);
	
	var info_mid1 = document.createElement('div');
	info_mid1.classList.add("info-mid");
	profile_selections2.appendChild(info_mid1);
	
	var u2 = document.createElement('ul');
	u2.classList.add("info-h2");
	u2.style.marginLeft = "50px";
	info_mid1.appendChild(u2);
	
	var l5 = document.createElement('li');
	l5.innerHTML = "";
	u2.appendChild(l5);
	var l6 = document.createElement('li');
	l6.innerHTML = "";
	u2.appendChild(l6);
	var l7 = document.createElement('li');
	l7.innerHTML = "";
	u2.appendChild(l7);
	var l8 = document.createElement('li');
	l8.innerHTML = "";
	u2.appendChild(l8);
	
	var info_right1 = document.createElement('div');
	info_right1.classList.add("info-right");
	profile_selections2.appendChild(info_right1);
	
	var u3 = document.createElement('ul');
	u3.classList.add("info-h2");
	u3.style.marginLeft = "50px";
	info_right1.appendChild(u3);
	
	var l9 = document.createElement('li');
	l9.innerHTML = "";
	u3.appendChild(l9);
	var l10 = document.createElement('li');
	l10.innerHTML = "";
	u3.appendChild(l10);
	var l11 = document.createElement('li');
	l11.innerHTML = "";
	u3.appendChild(l11);
	var l12 = document.createElement('li');
	l12.innerHTML = "";
	u3.appendChild(l12);
	
	var story_info = document.createElement('div');
	story_info.classList.add("story-info");
	modal_body_right.appendChild(story_info);
	
	var info_header3 = document.createElement('p');
	info_header3.classList.add("info-header");
	info_header3.textContent = "My Story";
	story_info.appendChild(info_header3);
	
	var story = document.createElement('div');
	story.classList.add("story");
	story.innerHTML = "Coming soon!";
	story_info.appendChild(story);
	
	var body_pad_right = document.createElement('div');
	body_pad_right.classList.add("body-pad-right");
	modal_body.appendChild(body_pad_right);
	
	var modal_footer = document.createElement('div');
	modal_footer.classList.add("modal-footer");
	profileFront.appendChild(modal_footer);
	
	return profile;
}
function createNewPetElement(name){
	var name = document.createElement('div');
	name.classList.add('pet');
	return name;
}
function createPetTitle(name){
	let pet__title = document.createElement('h2');
	pet__title.textContent = name;
	pet__title.classList.add('pet__title');
	return pet__title;
}
function createPetImage(img){
	let pet__img = document.createElement('img');
	pet__img.setAttribute("src",img);
	pet__img.setAttribute("width","100%");
	pet__img.setAttribute("height","100%");
	pet__img.setAttribute("alt", "Pet picture");
	return pet__img;
}
function createPetInformation(gender,breed){
	var pet__information_div = document.createElement('div');
	pet__information_div.classList.add('pet__information');
	let pet__gender = document.createElement('p');
	pet__gender.textContent = gender;
	pet__information_div.appendChild(pet__gender);
	let pet__breed = document.createElement('p');
	pet__breed.textContent = breed;
	pet__information_div.appendChild(pet__breed);
	return pet__information_div;
}
function createPetButtons(profile,element,count){
	let button_div = document.createElement('div');
	let button_wishList = document.createElement('a');
	let button_viewProfile = document.createElement('a');
	let input = document.createElement("INPUT");
	
	button_div.classList.add('btn__wrapper');
	
	button_wishList.classList.add('btn');
	button_wishList.classList.add('btn-color');
	button_wishList.textContent = 'Remove from Wish List';
	
	button_viewProfile.classList.add('btn');
	button_viewProfile.classList.add('btn-color');
	button_viewProfile.textContent = "View Pet Profile";
	
	input.setAttribute("type","hidden");
	input.setAttribute("name","pet"+count);
	
	
	button_wishList.addEventListener('click',function(){
		var new_list = [];
		for (var address of storedAddresses){
			if (element != address){
				new_list.push(address);
			}
		}
		localStorage.setItem("wishes",JSON.stringify(new_list));
		location.replace("/Web_Dev/wish_list.php")
	});
	button_viewProfile.addEventListener('click',function(){
		profile.style.display = 'block';
	});
	button_div.append(button_wishList,button_viewProfile);
	
	Dogs.appendChild(input);
	return button_div;
}
function clearList(){
	localStorage.clear();
	location.replace("/Web_Dev/wish_list.php")
}
</script>
    </body>
</html>