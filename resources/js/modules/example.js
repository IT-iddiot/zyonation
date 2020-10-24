const targets = [
    'gym',
    'sleep well',
    'meditation',
    'communication',
    'humble'
];

const routine = {
    morning : ['wake up', 'prepare', 'take ktm', 'arrive office'],
    afternoon : "Busy ...........",
    night : {
        at_first : "Chill a bit",
        then : "work at eleventh hour",
        finally : "sleep lo"
    }
}

class hello {
    constructor() {
        console.log("Helloworld");
    }
}

export { targets, routine, hello };

