<form class="admin-form" id="carForm" method="post" action="{{ $action }}">
    <div class="row">
      <div>
        <label for="brand">Марка</label>
        <input id="brand" name="brand" type="text" value="{{ $car['brand'] ?? '' }}" required>
      </div>
      <div>
        <label for="model">Модель</label>
        <input id="model" name="model" type="text" value="{{ $car['model'] ?? '' }}" required>
      </div>
      <div>
        <label for="type">Категория</label>
        <select id="type" name="type" required>
          <option value="legkovoy" {{ ($car['type'] ?? '') === 'legkovoy' ? 'selected' : '' }}>Легковой</option>
          <option value="gruzovoy" {{ ($car['type'] ?? '') === 'gruzovoy' ? 'selected' : '' }}>Грузовой</option>
          <option value="vnedorozhnik" {{ ($car['type'] ?? '') === 'vnedorozhnik' ? 'selected' : '' }}>Внедорожник</option>
          <option value="pricep" {{ ($car['type'] ?? '') === 'pricep' ? 'selected' : '' }}>С прицепом</option>
          <option value="spec" {{ ($car['type'] ?? '') === 'spec' ? 'selected' : '' }}>Спецтехника</option>
        </select>
      </div>
      <div>
        <label for="price">Цена</label>
        <input id="price" name="price" type="number" step="0.01" value="{{ $car['price'] ?? '' }}" required>
      </div>
      <div>
        <label for="fuel">Топливо</label>
        <select id="fuel" name="fuel">
          <option value="Бензин" {{ ($car['fuel'] ?? '') === 'Бензин' ? 'selected' : '' }}>Бензин</option>
          <option value="Дизель" {{ ($car['fuel'] ?? '') === 'Дизель' ? 'selected' : '' }}>Дизель</option>
        </select>
      </div>
      <div>
        <label for="engine">Двигатель</label>
        <input id="engine" name="engine" type="text" value="{{ $car['engine'] ?? '' }}">
      </div>
      <div>
        <label for="horsepower">Мощность</label>
        <input id="horsepower" name="horsepower" type="number" value="{{ $car['horsepower'] ?? '' }}">
      </div>
      <div>
        <label for="transmission">Коробка</label>
        <select id="transmission" name="transmission">
          <option value="Автомат" {{ ($car['transmission'] ?? '') === 'Автомат' ? 'selected' : '' }}>Автомат</option>
          <option value="Механика" {{ ($car['transmission'] ?? '') === 'Механика' ? 'selected' : '' }}>Механика</option>
        </select>
      </div>
      <div>
        <label for="drive_type">Привод</label>
        <select id="drive_type" name="drive_type">
          <option value="Передний" {{ ($car['drive_type'] ?? '') === 'Передний' ? 'selected' : '' }}>Передний</option>
          <option value="Задний" {{ ($car['drive_type'] ?? '') === 'Задний' ? 'selected' : '' }}>Задний</option>
          <option value="Полный" {{ ($car['drive_type'] ?? '') === 'Полный' ? 'selected' : '' }}>Полный</option>
        </select>
      </div>
      <div>
        <label for="body_type">Кузов</label>
        <input id="body_type" name="body_type" type="text" value="{{ $car['body_type'] ?? '' }}">
      </div>
      <div>
        <label for="year">Год</label>
        <input id="year" name="year" type="number" value="{{ $car['year'] ?? '' }}">
      </div>
      <div>
        <label for="acceleration">Разгон</label>
        <input id="acceleration" name="acceleration" type="text" value="{{ $car['acceleration'] ?? '' }}">
      </div>
      <div>
        <label for="consumption">Расход</label>
        <input id="consumption" name="consumption" type="text" value="{{ $car['consumption'] ?? '' }}">
      </div>
      <div>
        <label for="color">Цвет</label>
        <input id="color" name="color" type="text" value="{{ $car['color'] ?? '' }}">
      </div>
      <div>
        <label for="stock_count">Количество</label>
        <input id="stock_count" name="stock_count" type="number" value="{{ $car['stock_count'] ?? '' }}" required>
      </div>
      <div>
        <label for="city">Город</label>
        <input id="city" name="city" type="text" value="{{ $car['city'] ?? '' }}">
      </div>
      <div>
        <label for="image">Путь к изображению</label>
        <input id="image" name="image" type="text" value="{{ $car['image'] ?? '' }}" placeholder="cars/sedan.png">
      </div>
    </div>

    <div class="row full-width">
      <label for="description">Описание</label>
      <textarea id="description" name="description">{{ $car['description'] ?? '' }}</textarea>
    </div>

    <div class="row full-width">
      <button type="submit" class="btn-main">Сохранить</button>
    </div>
  </form>
