let data = [
    { id: 5 },
    { id: 4 }
]

let found = data.find(function(elem) {
    return elem.id == 5
})

console.log(found)