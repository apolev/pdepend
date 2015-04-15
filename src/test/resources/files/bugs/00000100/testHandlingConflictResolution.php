<?php

namespace Just\A\Test;

trait A {
    public function speakA() {
        return true;
    }
}

trait B {
    use A;
    public function speakB() {
        return false;
    }
}

class C {
    use A;
}

class D extends C {
    use A, B {
        A::speakA insteadof B;
    }

    public function check()
    {
        return $this->speakA();
    }
}

$d = new D();
$d->speakA();

