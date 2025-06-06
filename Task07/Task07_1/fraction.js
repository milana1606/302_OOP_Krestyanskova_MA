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

export function createFraction(chislitel, znamenatel) {
    // Нормализация дроби
    const gcd = calcNOD(chislitel, znamenatel);
    let normalizedNumer = chislitel / gcd;
    let normalizedDenom = znamenatel / gcd;
    if (normalizedDenom < 0) {
        normalizedNumer = -normalizedNumer;
        normalizedDenom = -normalizedDenom;
    }

    return {
        getNumer() {
            return normalizedNumer;
        },
        getDenom() {
            return normalizedDenom;
        },
        add(frac) {
            const otherNumer = frac.getNumer();
            const otherDenom = frac.getDenom();
            const newNumer = normalizedNumer * otherDenom + otherNumer * normalizedDenom;
            const newDenom = normalizedDenom * otherDenom;
            return createFraction(newNumer, newDenom);
        },
        sub(frac) {
            const otherNumer = frac.getNumer();
            const otherDenom = frac.getDenom();
            const newNumer = normalizedNumer * otherDenom - otherNumer * normalizedDenom;
            const newDenom = normalizedDenom * otherDenom;
            return createFraction(newNumer, newDenom);
        },
        toString() {
            if (normalizedNumer === 0) {
                return "0";
            } else if (normalizedDenom === 1) {
                return normalizedNumer.toString();
            } else if (Math.abs(normalizedNumer) < normalizedDenom) {
                return `${normalizedNumer}/${normalizedDenom}`;
            } else {
                const absNumer = Math.abs(normalizedNumer);
                const whole = Math.floor(absNumer / normalizedDenom);
                const remainder = absNumer % normalizedDenom;
                const sign = normalizedNumer < 0 ? "-" : "";
                if (remainder === 0) {
                    return `${sign}${whole}`;
                } else {
                    return `${sign}${whole}'${remainder}/${normalizedDenom}`;
                }
            }
        },
    };
}