const Cats = document.getElementById('cats');
const Cat = document.getElementById('cat');

Cats.appendChild(Cat.cloneNode(Cat));

function appendCloneChild(parent, child){
    parent.appendChild(child.cloneNode(true));
}

appendCloneChild(Cats, Cat);
appendCloneChild(Cats, Cat);
appendCloneChild(Cats, Cat);
appendCloneChild(Cats, Cat);
