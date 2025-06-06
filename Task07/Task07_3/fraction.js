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

export class Fraction {
    constructor(chislitel, znamenatel) {
        const gcd = calcNOD(chislitel, znamenatel);
        this._numer = chislitel / gcd;
        this._denom = znamenatel / gcd;
        if (this._denom < 0) {
            this._numer = -this._numer;
            this._denom = -this._denom;
        }
    }

    get numer() {
        return this._numer;
    }

    get denom() {
        return this._denom;
    }

    add(frac) {
        const otherNumer = frac.numer;
        const otherDenom = frac.denom;
        const newNumer = this._numer * otherDenom + otherNumer * this._denom;
        const newDenom = this._denom * otherDenom;
        return new Fraction(newNumer, newDenom);
    }

    sub(frac) {
        const otherNumer = frac.numer;
        const otherDenom = frac.denom;
        const newNumer = this._numer * otherDenom - otherNumer * this._denom;
        const newDenom = this._denom * otherDenom;
        return new Fraction(newNumer, newDenom);
    }

    toString() {
        if (this._numer === 0) {
            return "0";
        } else if (this._denom === 1) {
            return this._numer.toString();
        } else if (Math.abs(this._numer) < this._denom) {
            return `${this._numer}/${this._denom}`;
        } else {
            const absNumer = Math.abs(this._numer);
            const whole = Math.floor(absNumer / this._denom);
            const remainder = absNumer % this._denom;
            const sign = this._numer < 0 ? "-" : "";
            if (remainder === 0) {
                return `${sign}${whole}`;
            } else {
                return `${sign}${whole}'${remainder}/${this._denom}`;
            }
        }
    }
}