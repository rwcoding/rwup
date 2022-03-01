<?php

#[Attribute(Attribute::TARGET_ALL)]
class Att
{
    public function __construct(
        public bool   $required = true,
        public string $desc = '',
        public int    $length = 0,
        public string $sample = '',
        public int    $order = 100,
    )
    {
    }

    public function parse(): array
    {
        return [
            'required' => $this->required,
            'desc' => $this->desc,
            'length' => $this->length,
            'sample' => $this->sample,
        ];
    }
}

#[Attribute(Attribute::TARGET_ALL)]
class AttRequired
{
    public function __construct(public bool $required = true)
    {
    }

    public function parse(): array
    {
        return ['required' => $this->required];
    }
}

#[Attribute(Attribute::TARGET_ALL)]
class AttLength
{
    public function __construct(public int $length = 0)
    {
    }

    public function parse(): array
    {
        return ['length' => $this->length];
    }
}

#[Attribute(Attribute::TARGET_ALL)]
class AttDesc
{
    public function __construct(public string $desc = '')
    {
    }

    public function parse(): array
    {
        return ['desc' => $this->desc];
    }
}

#[Attribute(Attribute::TARGET_ALL)]
class AttOrder
{
    public function __construct(public int $order = 100)
    {
    }

    public function parse(): array
    {
        return ['order' => $this->order];
    }
}

abstract class Params
{
    private array $ps = [];
    private array $notPs = [];
    private array $ext = [];

    public function need(string $name): bool
    {
        if (in_array($name, $this->notPs)) {
            return false;
        }
        if ($this->ps && !in_array($name, $this->ps)) {
            return false;
        }
        return true;
    }

    public function only(string|array $name): static
    {
        if (is_array($name)) {
            $this->ps = array_merge($this->ps, $name);
        } else {
            $this->ps[] = $name;
        }
        return $this;
    }

    public function exclude(string|array $name): static
    {
        if (is_array($name)) {
            $this->notPs = array_merge($this->notPs, $name);
        } else {
            $this->notPs[] = $name;
        }
        return $this;
    }

    public function add(array $data): static
    {
        $data['desc'] = $data['desc'] ?? '';
        $data['required'] = $data['required'] ?? true;
        $data['length'] = $data['length'] ?? 0;
        $data['sample'] = $data['sample'] ?? '';
        $data['order'] = $data['order'] ?? 100;

        $this->ext[] = $data;
        return $this;
    }

    public function extend(): array
    {
        return $this->ext;
    }
}
