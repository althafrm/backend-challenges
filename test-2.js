const array = [2, 3, 1, 2, 3];
const multiple = array.filter((value, index, self) => (self.indexOf(value) !== index));

console.log(`array: [${array.join(',')}]`);
console.log(`multiple: ${multiple.join(',')}`);
