<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agile Adoption</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
		<?php $name = $_POST["name"]; ?>
		<?php $gender = $_POST["gender"]; ?>
		<?php $age = $_POST["age"]; ?>
		<?php $dog = $_POST["dog"]; ?>
        <header>
            <h1 class="logo"><a href="/Web_Dev/index.html">Agile Adoption</a></h1>
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

            <h2 class="main-header">Welcome!</h2>


            <!--start section for pet display-->
            <section>
                <div class="pet-display-header">
                    <h2 class="section__title">Take A Look At Some Of Our Pets!</h2>
                </div>

                 <!--Dogs wrapper-->
                 <section class="pets-wrapper">
                    <h2 class="section__title">Dogs</h2>

                    <div id="dogs" class="pets">
                        <!--javascript runs here-->
                    </div>
					<script>
						var name = "<?php echo $name;?>";
						var gender = "<?php echo $gender;?>";
						var breed = "<?php echo $name;?>";
						var names = ["Bella","Charlie","Coco","Daisy","Lola","Molly","Phoebe","Poppy","Rosie","Teddy"];
						var breeds = ["American Cattle Dog","American Pit Bull Terrier","American Shepherd","American Staffordshire Terrier","Border Collie","Boxer","Dachshund","German Shepherd","Rottweiler","Shih Tzu"];
						
						const Dogs = document.getElementById('dogs');
						let dogCounter = 0;
						
						if (name.length === 0 || comparisons(name,names) === 0){
							if (gender === "Both"){
								if (breed.length === 0){
									for (i = 0; i < names.length; i++) {
										for (j = 0; j < breeds.length; j++){
											img = '../Web_Dev/pet_images/' + names[i] + '/Female/' + breeds[j] + '/' + names[i] + '.jpg';
											if (doesFileExist(img) == true){
												Dogs.append(createDog(createNewPetElement(names[i]),names[i],'Female',breeds[j], img));
											}
											img = '../Web_Dev/pet_images/' + names[i] + '/Male/' + breeds[j] + '/' + names[i] + '.jpg';
											if (doesFileExist(img) == true){
												Dogs.append(createDog(createNewPetElement(names[i]),names[i],'Male',breeds[j], img));
											}
										}
									}
								}
								else {
									for (i = 0; i < names.length; i++) {
										img = '../Web_Dev/pet_images/' + names[i] + '/Female/' + breed + '/' + names[i] + '.jpg';
										if (doesFileExist(img) == true){
											Dogs.append(createDog(createNewPetElement(names[i]),names[i],'Female',breed, img));
										}
										img = '../Web_Dev/pet_images/' + names[i] + '/Male/' + breed + '/' + names[i] + '.jpg';
										if (doesFileExist(img) == true){
											Dogs.append(createDog(createNewPetElement(names[i]),names[i],'Male',breed, img));
										}
									}
								}
							}
							else {
								if (breed.length === 0){
									for (i = 0; i < names.length; i++) {
										for (j = 0; j < breeds.length; j++){
											img = '../Web_Dev/pet_images/' + names[i] + '/' + gender + '/' + breeds[j] + '/' + names[i] + '.jpg';
											if (doesFileExist(img) == true){
												Dogs.append(createDog(createNewPetElement(names[i]),names[i],gender,breeds[j], img));
											}
										}
									}
								}
								else {
									for (i = 0; i < names.length; i++) {
										img = '../Web_Dev/pet_images/' + names[i] + '/' + gender + '/' + breed + '/' + names[i] + '.jpg';
										if (doesFileExist(img) == true){
											Dogs.append(createDog(createNewPetElement(names[i]),names[i],gender,breed, img));
										}
									}
								}
							}
						}
						else{
							if (gender === "Both"){
								if (breed.length === 0){
									for (j = 0; j < breeds.length; j++){
										img = '../Web_Dev/pet_images/' + name + '/Female/' + breeds[j] + '/' + name + '.jpg';
										if (doesFileExist(img) == true){
											Dogs.append(createDog(createNewPetElement(name),name,'Female',breeds[j], img));
										}
										img = '../Web_Dev/pet_images/' + name + '/Male/' + breeds[j] + '/' + name + '.jpg';
										if (doesFileExist(img) == true){
											Dogs.append(createDog(createNewPetElement(name),name,'Male',breeds[j], img));
										}
									}
								}
								else {
									img = '../Web_Dev/pet_images/' + name + '/Female/' + breed + '/' + name + '.jpg';
									if (doesFileExist(img) == true){
										Dogs.append(createDog(createNewPetElement(name),name,'Female',breed, img));
									}
									img = '../Web_Dev/pet_images/' + name + '/Male/' + breed + '/' + name + '.jpg';
									if (doesFileExist(img) == true){
										Dogs.append(createDog(createNewPetElement(name),name,'Male',breed, img));
									}
								}
							}
							else {
								if (breed.length === 0){
									for (j = 0; j < breeds.length; j++){
										img = '../Web_Dev/pet_images/' + name + '/' + gender + '/' + breeds[j] + '/' + name + '.jpg';
										if (doesFileExist(img) == true){
											Dogs.append(createDog(createNewPetElement(name),name,gender,breeds[j], img));
										}
									}
								}
								else {
									img = '../Web_Dev/pet_images/' + name + '/' + gender + '/' + breed + '/' + name + '.jpg';
									if (doesFileExist(img) == true){
										Dogs.append(createDog(createNewPetElement(name),name,gender,breed, img));
									}
								}
							}
						}
						function comparisons(name,names){
							var x = 0;
							var i;
							for (i = 0; i < names.length; i++) {
								if (name.toLowerCase() === names[i].toLowerCase()){
									x = 1;
								}
							}
							return x;
						}
						function doesFileExist(urlToFile) {
							var xhr = new XMLHttpRequest();
							xhr.open('HEAD', urlToFile, false);
							xhr.send();
							if (xhr.status == "404") {
								return false;
							} else {
								return true;
							}
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
						function createPetInformation(gender,breed){
							let pet__information_div = document.createElement('div');
							let pet__gender = document.createElement('p');
							let pet__breed = document.createElement('p');
							
							pet__information_div.classList.add('pet__information');
							pet__gender.textContent = gender;
							pet__breed.textContent = breed;
							pet__information_div.append(pet__gender,pet__breed);
							return pet__information_div;
						}
						function createPetImage(img){
							let pet__img = document.createElement('img');
							
							pet__img.setAttribute("src",img);
							pet__img.setAttribute("width","100%");
							pet__img.setAttribute("height","100%");
							pet__img.setAttribute("alt", "Pet picture");
							return pet__img;
						}
						function createPetButtons(){
							let button_div = document.createElement('div');
							let button_wishList = document.createElement('a');
							let button_viewProfile = document.createElement('a');
							
							button_div.classList.add('btn__wrapper');
							
							button_wishList.classList.add('btn');
							button_wishList.classList.add('btn-color');
							button_wishList.textContent = 'Add to Wish List';
							
							button_viewProfile.classList.add('btn');
							button_viewProfile.classList.add('btn-color');
							button_viewProfile.textContent = "View Pet Profile";
							
							button_wishList.addEventListener('click',function(){
								console.log('you click on wish list for dog');
							});
							button_viewProfile.addEventListener('click',function(){
								console.log('you click on view pet profile for dog');
							});
							
							button_div.append(button_wishList,button_viewProfile);
							return button_div;
						}
						function createPet(varname, name, gender, breed, img){
							varname.setAttribute('id','dog'+(++dogCounter));
							varname.style.marginLeft = "1.2em";
							varname.append(createPetTitle(name),createPetImage(img),createPetInformation(gender,breed),createPetButtons());
							return varname;
						}
					</script>

                </section>

            </section> <!--end section for pet display-->
            
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
    </body>
</html>