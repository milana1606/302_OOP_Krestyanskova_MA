function calcNOD(a, b) {
    a = Math.abs(a);
    b = Math.abs(b);
    while (b !== 0) {
        let temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}

export function Fraction(chislitel, znamenatel) {
    const gcd = calcNOD(chislitel, znamenatel);
    this.numer = chislitel / gcd;
    this.denom = znamenatel / gcd;
    if (this.denom < 0) {
        this.numer = -this.numer;
        this.denom = -this.denom;
    }
}

Fraction.prototype.getNumer = function () {
    return this.numer;
};

Fraction.prototype.getDenom = function () {
    return this.denom;
};

Fraction.prototype.add = function (frac) {
    const otherNumer = frac.getNumer();
    const otherDenom = frac.getDenom();
    const newNumer = this.numer * otherDenom + otherNumer * this.denom;
    const newDenom = this.denom * otherDenom;
    return new Fraction(newNumer, newDenom);
};

Fraction.prototype.sub = function (frac) {
    const otherNumer = frac.getNumer();
    const otherDenom = frac.getDenom();
    const newNumer = this.numer * otherDenom - otherNumer * this.denom;
    const newDenom = this.denom * otherDenom;
    return new Fraction(newNumer, newDenom);
};

Fraction.prototype.toString = function () {
    if (this.numer === 0) {
        return "0";
    } else if (this.denom === 1) {
        return this.numer.toString();
    } else if (Math.abs(this.numer) < this.denom) {
        return `${this.numer}/${this.denom}`;
    } else {
        const absNumer = Math.abs(this.numer);
        const whole = Math.floor(absNumer / this.denom);
        const remainder = absNumer % this.denom;
        const sign = this.numer < 0 ? "-" : "";
        if (remainder === 0) {
            return `${sign}${whole}`;
        } else {
            return `${sign}${whole}'${remainder}/${this.denom}`;
        }
    }
};