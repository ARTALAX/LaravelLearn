// let a = 'HELLO '
// let b = 'NIGGERS'
// console.log(a + b)
// const myCity = {
//     city: 'New york'
// }
// console.log(myCity)
// myCity.country = 'USA'
// console.log(myCity)
// myCity.president = 'tramp'
// console.log(myCity)
// delete myCity.president
// console.log(myCity)
// const dog = {
//     paroda: 'labrador',
//     gaf() {
//         console.log('gaf')
//     }
// }
//
// const dog2 = Object.assign({}, dog)
// dog2.paroda = 'lib'
// console.log(dog2.paroda)
// console.log(dog.paroda)

// const dog = {
//     paroda: 'labrador',
//     gaf() {
//         console.log('gaf')
//     }
// }
//
// const dog2 = {...dog}
// dog2.paroda = 'liba'
// console.log(dog2.paroda)
// console.log(dog.paroda)

const dog = {
    paroda: 'labrador',
    gaf() {
        console.log('gaf')
    }
}

const dog2 = JSON.parse(JSON.stringify(dog))
dog2.paroda = 'liba'
console.log(dog2.paroda)
console.log(dog.paroda)
